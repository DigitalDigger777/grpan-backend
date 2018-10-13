<?php
/**
 * Created by PhpStorm.
 * User: korman
 * Date: 13.10.18
 * Time: 23:02
 */

namespace App\Library;

use \Illuminate\Http\Request;

class StaticContentBuilder
{
    /**
     * Build header for request.
     *
     * @param Request $request
     * @return array
     */
    public function header(Request $request)
    {
        $header = [];

        if ($title = $request->get('header_title')) {
            $header['title'] = $title;
        }

        if ($text = $request->get('header_text')){
            $header['text'] = $text;
        }

        return $header;
    }

    /**
     * Build Our Story for request.
     *
     * @param Request $request
     * @return array
     */
    public function ourStory(Request $request)
    {
        $result = [];

        if ($title = $request->get('our_story_title')) {
            $result['title'] = $title;
        }

        if ($text = $request->get('our_story_text')){
            $result['text'] = $text;
        }

        return $result;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function news(Request $request)
    {
        $result = [];

        if ($title = $request->get('news_title')) {
            $result['title'] = $title;
        }

        if ($text = $request->get('news_text')) {
            $result['text'] = $text;
        }

        return $result;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function bottom(Request $request)
    {
        $result = [];

        if ($title = $request->get('bottom_title')) {
            $result['title'] = $title;
        }

        if ($text = $request->get('bottom_text')) {
            $result['text'] = $text;
        }

        return $result;
    }

    /**
     * Build Success Story for request.
     *
     * @param Request $request
     * @return array
     */
    public function successStory(Request $request)
    {
        $result = [];
        $slides = [];

        for ($i = 0; $i < 3; $i++) {

            if ($title = $request->get('success_story_title_' . $i)) {
                $slides[$i]['title'] = $title;
            }

            if ($text = $request->get('success_story_text_' . $i)) {
                $slides[$i]['text'] = $text;
            }
        }

        if (count($slides) > 0) {
            $result['slides'] = $slides;
        }

        return $result;
    }

    /**
     * @param Request $request
     */
    public function build(Request $request)
    {
        $header = $this->header($request);
        $ourStory = $this->ourStory($request);
        $news = $this->news($request);
        $bottom = $this->bottom($request);
        $successStory = $this->successStory($request);

        $result = [];

        if (count($header) > 0) {
            $result['header'] = $header;
        }

        if (count($ourStory) > 0) {
            $result['our_story'] = $ourStory;
        }

        if (count($news) > 0) {
            $result['news'] = $news;
        }

        if (count($bottom) > 0) {
            $result['bottom'] = $bottom;
        }

        if (count($successStory) > 0) {
            $result['success_story'] = $successStory;
        }

        return $result;
    }
}