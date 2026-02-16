<?php

namespace App\Http\Controllers\Api\Landing;

use App\Http\Controllers\Controller;
use App\Http\Resources\Landing\Business\DetailShopResource;
use App\Http\Resources\Landing\Business\ListShopResource;
use App\Repositories\Eloquent\BusinessRepository;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, BusinessRepository $businessRepository): JsonResponse
    {
        $filters = $request->only(['category_id', 'search', 'sort']);
        $pagination = $request->only(['page', 'per_page']);
        $columns = ['id', 'category_id', 'name', 'slug', 'address', 'description', 'status', 'logo_url', 'banner_url'];
        $searchableColumns = ['name', 'address', 'description'];
        $businesses = $businessRepository->getShopList($filters, $columns, $searchableColumns);
        $businesses = ListShopResource::collection($businesses);

        return Response::paginated('Business list retrieved successfully', $businesses->paginate($pagination['per_page'] ?? 10, $pagination['page'] ?? 1));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, BusinessRepository $businessRepository): JsonResponse
    {
        $business = $businessRepository->getShopDetails($slug, [
            'id',
            'owner_id',
            'category_id',
            'name',
            'slug',
            'address',
            'description',
            'phone',
            'logo_url',
            'banner_url',
            'created_at',
        ]);

        if (! $business) {
            return Response::error('Business not found', 404);
        }

        return Response::success('Business details retrieved successfully', new DetailShopResource($business));
    }

    public function products(Request $request, string $slug, ProductRepository $productRepository): JsonResponse
    {
        $products = $productRepository->popularProductsByBusiness($slug, [
            'id',
            'business_id',
            'category_id',
            'name',
            'slug',
            'price',
        ]);

        if ($products === null) {
            return Response::error('Business not found', 404);
        }

        return Response::success('Products retrieved successfully', $products);
    }
}
