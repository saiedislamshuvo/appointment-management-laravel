<?php

namespace App\Http\Controllers\Appearance;

use App\Models\Appearance\AppearanceSetting;
use App\Http\Repositories\Core\MediaRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppearanceSettingController extends Controller
{
    private $mediaRepository;

    public function __construct(MediaRepository $mediaRepository) {
        $this->mediaRepository = $mediaRepository;
    }

    public function index() {
        return view('src.pages.appearance.setting.index', [
            'info' => AppearanceSetting::getAppInfo(),
            'social' => AppearanceSetting::getSocialInfo(),
        ]);
    }

    public function appFaviconUpdate(Request $request) {
        $file = $request->file('file');
        if($file) {
            $media = $this->mediaRepository->store($file, '/appearance');
            AppearanceSetting::set('app_favicon', $media->path);
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 400);
    }

    public function appLogoUpdate(Request $request) {
        $file = $request->file('file');
        if($file) {
            $media = $this->mediaRepository->store($file, '/appearance');
            AppearanceSetting::set('app_logo', $media->path);
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 400);
    }

    public function appFooterLogoUpdate(Request $request) {
        $file = $request->file('file');
        if($file) {
            $media = $this->mediaRepository->store($file, '/appearance');
            AppearanceSetting::set('app_footer_logo', $media->path);
        }

        return response()->json(['success' => true], 200);
    }

    public function appInfoUpdate(Request $request) {
        AppearanceSetting::set('app_name', $request->name);
        AppearanceSetting::set('app_email', $request->email);
        AppearanceSetting::set('app_phone', $request->phone);
        AppearanceSetting::set('app_location', $request->location);

        return redirect()->route('appearance.settings.index');
    }

    public function appSocialUpdate(Request $request) {
        AppearanceSetting::set('app_facebook', $request->facebook);
        AppearanceSetting::set('app_google', $request->google);
        AppearanceSetting::set('app_twitter', $request->twitter);
        AppearanceSetting::set('app_linkedin', $request->linkedin);

        return redirect()->route('appearance.settings.index');
    }

    public function appFooterUpdate(Request $request) {
        AppearanceSetting::set('app_footer_text', $request->footer_text);

        return redirect()->route('appearance.settings.index');
    }

}
