<?php /** @noinspection ALL */

namespace App\Http\Controllers;
use App\Exceptions\ProductOrReviewNotBelongToUser;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param ReviewRequest $request
     * @param Product $product
     * @return void
     */
    public function store(ReviewRequest $request, Product $product)
    {
        $review = new Review($request->all());
        $product->reviews()->save($review);
        return response([
                            'data' => new ReviewResource($review)
                        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Review $review)
    {
        $review->update($request->all());
        return response([
                            'data' => new ReviewResource($review)
                        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Review $review)
    {
        $this->productReviewUserCheck($product,$review);

        $review->delete();
        return \response()->json([
                                     'status'  => Response::HTTP_NO_CONTENT,
                                     'message' => 'Review has been deleted'
                                 ]);
    }

    public function productReviewUserCheck($product,$review)
    {
//                38                     29                    6                5
        if ($review->product_id != $product->id || auth()->user()->id != $product->user_id) {
            throw new ProductOrReviewNotBelongToUser;
        }
    }
}
