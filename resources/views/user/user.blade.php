@extends("../layouts/layout")
@section("title") User Dashboard @endsection
@section("body")
<div class ="container mt-5">
    <div class="col-md-8 offset-md-2 mb-3 card p-4">
        <table>
            <tr><th colspan="3"><h2 class="text-center">User Data</h2></th></tr>
            <tr>
                <th>Fulname</th>
                <td>{{ Auth::user()->name }}</td>
                <td class="text-center"><a class="btn btn-block">Change Fullname</a></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ Auth::user()->email }}</td>
                <td class="text-center"><a class="btn btn-block">Change Email</a></td>
            </tr>
            <tr>
                <th>Password</th>
                <td>*******************************</td>
                <td class="text-center"><a class="btn btn-block">Change Password</a></td>
            </tr>
            <tr>
                <th class="py-2">Created At</th>
                <td>{{ Auth::user()->created_at->format("D M, Y - H:i A") }}</td>
            </tr>
            <tr>
                <th class="py-2">Updated At</th>
                <td>{{ Auth::user()->updated_at->format("D M, Y - H:i A") }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection