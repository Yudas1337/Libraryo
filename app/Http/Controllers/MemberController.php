<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{

    public function index()
    {
        $get    = User::where('is_admin', 0);
        $member   = $get->get();
        $count  = $get->count();
        return view('admin.pages.member.index', compact('member', 'count'));
    }

    public function show($id)
    {
        $member = User::findorfail($id);
        return view('admin.pages.member.show', compact('member'));
    }

    public function nonaktif()
    {
        $member   = User::onlyTrashed()->where('is_admin', 0)->get();
        $count  = $member->count();
        return view('admin.pages.member.nonaktif', compact('member', 'count'));
    }

    public function restore($id = null)
    {
        $user = ($id != null ? User::onlyTrashed()->where('id', $id) : User::onlyTrashed()->where('is_admin', 0));
        $user->restore();
        if ($id)
            return redirect('admin/member/nonaktif')->with('status', 'Berhasil aktifkan member');
        else
            return redirect('admin/member/nonaktif')->with('status', 'Berhasil aktifkan semua member');
    }

    public function deletePermanent($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        if ($user->foto != 'default_male.jpg' && $user->foto != 'default_female.jpg') {
            Storage::delete('public/assets/foto_user/' . $user->foto);
        }
        $user->forceDelete();
        return redirect('admin/member/nonaktif')->with('status', 'Berhasil hapus permanen member');
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect('admin/member')->with('status', 'Berhasil nonaktifkan member');
    }
}
