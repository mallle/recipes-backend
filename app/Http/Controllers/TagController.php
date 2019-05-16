<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    use Validation\ValidateTagRequest;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('type')->get();

        return view('tags.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateRequest($request);

        $request->validate([
            'name' => 'unique:tags,name|required',
        ]);

        $tag = new Tag;

        if(!$tag)
        {
            return back()->with(['error', 'Tags cannot be found']);
        } 

        else
        {
            $tag->name = $request->get('name');

            if ($request->get('type') == 'Kategorie')
            {
                $tag->type = Tag::TYPE_CATEGORY;
            }
            if ($request->get('type') == 'Zubereitung')
            {
                $tag->type = Tag::TYPE_PREPERATION;
            }
            if ($request->get('type') == 'Zeit')
            {
                $tag->type = Tag::TYPE_TIME;
            }
            if ($request->get('type') == 'Fleisch')
            {
                $tag->type = Tag::TYPE_MEET;
            }
            if($tag)
            {
            $tag->save();
                return back()->with(['success' => 'Tag was added']);
            } 
            if(!$tag)
            {
                return back()->with(['error', 'Tag was not added']);
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tag_id)
    {
        $tag = Tag::find($tag_id);

        return view('tags.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);
        
        $tag = Tag::find($id);

        if(!$tag)
        {
            return back()->with(['error', 'Tag not found']);
        } 
        else
        {  
            $tag->name = $request->get('name');

            if ($request->get('type') == 'Kategorie')
            {
                $tag->type = Tag::TYPE_CATEGORY;
            }
            if ($request->get('type') == 'Zubereitung')
            {
                $tag->type = Tag::TYPE_PREPERATION;
            }
            if ($request->get('type') == 'Zeit')
            {
                $tag->type = Tag::TYPE_TIME;
            }
            if ($request->get('type') == 'Fleisch')
            {
                $tag->type = Tag::TYPE_MEET;
            }

            $tag->update();

            if($tag)
            {
                return redirect('/tags')->with(['success' => 'Tag was updated']);
            } 
            else
            {
                return back()->with(['error' => 'Tag was not updated']);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        if(!$tag)
        {
            return back()->with(['error' => 'Tag not found']);
        } 
        elseif($tag)
        {
            $tag->delete();
            return back()->with(['success' => 'Tag was deleted']);
        } 
        else
        {
            return back()->with(['error' => 'Tag was not deleted']);
        }
    }

}
