<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Display the dashboard view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(Request $request)
    {
        $request->request->add(['required_perm' => 'Administrator']);
        return view('dashboard')->with(['page_title' => 'Dashboard']);
    }

    /**
     * Display the monitoring logs view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function system_logs(Request $request)
    {
        $request->request->add(['required_perm' => 'Administrator']);
        $logs = Log::orderBy('created_at', 'DESC')->get();
        return view('system.logs')->with(['page_title' => 'Monitoring Logs', 'logs' => $logs]);
    }

    /**
     * Display the system users view
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function system_users(Request $request)
    {
        $request->request->add(['required_perm' => 'Administrator']);
        $users = User::all();
        return view('system.users')->with(['page_title' => 'System Accounts', 'users' => $users]);
    }

    /**
     * Display the system roles view
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function system_roles(Request $request)
    {
        $request->request->add(['required_perm' => 'Administrator']);
        $roles = Role::all();
        return view('system.roles')->with(['page_title' => 'Account Roles', 'roles' => $roles]);
    }
}
