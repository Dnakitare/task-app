<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        // using the name query parameter to filter the members, paginate the results, and return the members in descending order of their id
        $members = Member::query()
            ->when(request('name'), function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $members;
    }

    public function show(Member $member)
    {
        return $member;
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        return response($member, 201);
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        return response()->json($member, 200);
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response(null, 204);
    }
}
