<?php

namespace App\Http\Controllers\Api\Landing;

use App\Facades\System;
use App\Http\Controllers\Controller;
use App\Http\Resources\Landing\Home\IncomingEventResource;
use App\Http\Resources\Landing\Home\PopularProductResource;
use App\Http\Resources\Landing\Home\RecommendShopResource;
use App\Repositories\Eloquent\BusinessRepository;
use App\Repositories\Eloquent\EventRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\UserRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function statistics(
        BusinessRepository $businessRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository,
        UserRepository $userRepository,
    ): JsonResponse {
        $roles = config('rbac.list.roles');
        $statistics = [
            'total_shops'        => $businessRepository->getTotalShops(true),
            'total_products'     => $productRepository->getTotalProducts(),
            'total_transactions' => $orderRepository->getTotalOrders(true),
            'total_users'        => $userRepository->getTotalUsers(array_diff($roles, [config('rbac.role.highest')])),
        ];

        return Response::success('Statistics retrieved successfully', $statistics);
    }

    /**
     * Handle the incoming request.
     */
    public function incomingEvents(EventRepository $eventRepository): JsonResponse
    {
        try {
            $events = $eventRepository->getIncomingEvents([
                'id',
                'created_by',
                'title',
                'slug',
                'description',
                'location',
                'is_open_for_registration',
                'start_time',
                'end_time',
                'logo_url',
                'banner_url',
            ]);

            return Response::success('Incoming events retrieved successfully', IncomingEventResource::collection($events));
        } catch (Exception $e) {
            System::error('Failed to retrieve incoming events', ['error' => $e->getMessage()]);

            return Response::error('Failed to retrieve incoming events', [], 500);
        }
    }

    /**
     * Handle the incoming request.
     */
    public function popularProducts(ProductRepository $productRepository): JsonResponse
    {
        try {
            $products = $productRepository->popularProducts([
                'id',
                'business_id',
                'name',
                'slug',
                'price',
            ]);

            return Response::success('Popular products retrieved successfully', PopularProductResource::collection($products));
        } catch (Exception $e) {
            System::error('Failed to retrieve popular products', ['error' => $e->getMessage()]);

            return Response::error('Failed to retrieve popular products', [], 500);
        }
    }

    /**
     * Handle the incoming request.
     */
    public function recommendedShops(BusinessRepository $businessRepository): JsonResponse
    {
        try {
            $shops = $businessRepository->recommendedShops([
                'id',
                'category_id',
                'name',
                'slug',
                'address',
                'description',
                'logo_url',
                'banner_url',
                'status',
            ]);

            return Response::success('Recommended shops retrieved successfully', RecommendShopResource::collection($shops));
        } catch (Exception $e) {
            System::error('Failed to retrieve recommended shops', ['error' => $e->getMessage()]);

            return Response::error('Failed to retrieve recommended shops', [], 500);
        }
    }
}
