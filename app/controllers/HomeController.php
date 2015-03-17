<?php

class HomeController extends BaseController 
{
    public function getIndex()
    {
        return \View::make('home.index');
    }
    
    public function submitStory()
    {
        $validator = \Validator::make(\Input::all(), [
           'companyName' => 'required|min:1',
           'email' => 'email',
           'message' => 'required' 
        ]);
        
        if($validator->fails()) {
            return \Response::json(['success' => false]);
        }
        
        $story = new Story();
        $story->company = \Input::get('companyName');
        $story->email = \Input::get('email', null);
        $story->story = \Input::get('message');
        $story->save();
        
        return \Response::json(['success' => true]);
    }
}
