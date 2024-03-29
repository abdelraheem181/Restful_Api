<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lesson;
use App\User;
use App\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Response;

class RelationshipController extends Controller
{
    public function  lessonUser($id){
        $lessons = User::findOrFail($id)->lessons ;
       
        return Response::json([
            'data' => $lessons->toArray()
        ],200);
     }
     public function lessonTag($id){
        $lesson = Lesson::findOrFail($id)->tags ;
        $fields = array();
        $filtered = array();
        foreach ($lesson as $tag) {

            $fields['Tag'] = $tag->name;
            $filtered[] = $fields;
        }

        return Response::json([
            'data' => $filtered
        ],200);
     }
     public function tagLesson($id){
        $lessons = Tag::findOrFail($id)->lessons ;
        $fields = array();
        $filtered = array();
        foreach ($lessons as $lesson) {

            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;
            $filtered[] = $fields;
        }

        return Response::json([
            'data' => $filtered
        ],200);

     }
}
