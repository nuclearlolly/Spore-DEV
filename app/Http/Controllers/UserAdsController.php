<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class UserAdsController extends Controller {

    /**
     * Shows the user ads index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getUserAdsIndex() {

        return view('user-ads.index', [
            'galleries'       => $galleries->paginate(10),
            'galleryPage'     => false,
            'sideGallery'     => null,
            'submissionsOpen' => Settings::get('gallery_submissions_open'),
        ]);
    }

    /**
     * Shows the news index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex() {
        if (Auth::check() && Auth::user()->is_news_unread) {
            Auth::user()->update(['is_news_unread' => 0]);
        }

        return view('news.index', ['newses' => News::visible()->orderBy('updated_at', 'DESC')->paginate(10)]);
    }

    /**
     * Shows a given user ad.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getUserAd($id, Request $request) {
         $user_ad = UserAd::visible()->where('id', $id)->withCount('submissions')->first();
        if (!$user_ad) {
            abort(404);
        }

          $query = GallerySubmission::where('ad_id', $gallery->id)->visible(Auth::check() ? Auth::user() : null);
    }

    // /**
    //  * Edits the user's profile.
    //  *
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function postProfile(Request $request) {
    //     Auth::user()->profile->update([
    //         'text'        => $request->get('text'),
    //         'parsed_text' => parse($request->get('text')),
    //     ]);
    //     flash('Profile updated successfully.')->success();

    //     return redirect()->back();
    // }
}