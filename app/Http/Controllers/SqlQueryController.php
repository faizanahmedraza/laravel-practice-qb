<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SqlQueryController extends Controller
{
    public function index()
    {
        //inner join with query builder
        $user = $users = User::select(
            "users.*",
            "role_user.role_id"
        )
            ->join('role_user','users.id','=','role_user.user_id')
            ->first();

        $query =DB::table('blog_posts')
            ->join('model_names_relations', 'blog_posts.id', '=', 'model_names_relations.blog_post_id')
            ->join('model_names', 'model_names.id', '=', 'model_names_relations.model_name_id')
            ->where('blog_posts.id', '12')
            ->get();

        dd($users);

        /*
         * User::with('roles')->first() in sql
         *SELECT * FROM `users` LIMIT 1
         *SELECT `roles`.*, `role_user`.`user_id` AS `pivot_user_id`, `role_user`.`role_id` AS `pivot_role_id` FROM `roles` INNER JOIN `role_user` ON `roles`.`id` = `role_user`.`role_id` WHERE `role_user`.`user_id` in (1)
         */

        /*
         * Role::with('users')->first() in sql
         *SELECT * FROM `roles` LIMIT 1
         *SELECT `users`.*, `role_user`.`user_id` AS `pivot_user_id`, `role_user`.`role_id` AS `pivot_role_id` FROM `users` INNER JOIN `role_user` ON `users`.`id` = `role_user`.`role_id` WHERE `role_user`.`user_id` in (1)
         */

        return view('sql-test.index', compact('users'));
    }
}
