@extends('layouts.app')


@section('content')
    @parent
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($staffs as $staff)
                            <tr class="staff-list">
                                <td>{{ $staff->id }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->email }}</td>
                            </tr>
                            <tr class="staff-detail" id="{{ $staff->id }}">
                                <td colspan="3">
                                    <table class="table" id="{{ $staff->id }}staff-detail">
                                        <tr>
                                            <td>User level: </td>
                                            <td class="show-detail {{ $staff->id }}level" level id="{{ $staff->id }}level">{{ $staff->userProfile->level }}</td>
                                            <td class="edit-detail"><input type="text" class="form-control editing {{ $staff->id }}level" id="{{ $staff->id }}level" value="{{ $staff->userProfile->level }}"></td>
                                        </tr>
                                        <tr>
                                            <td>User power: </td>
                                            <td class="show-detail {{ $staff->id }}power" id="{{ $staff->id }}power">{{ $staff->userProfile->power }}</td>
                                            <td class="edit-detail"><input type="text" class="form-control editing {{ $staff->id }}power" id="{{ $staff->id }}power" value="{{ $staff->userProfile->power }}"></td>
                                        </tr>
                                    </table>
                                    <div class="text-center">
                                        <input type="text" id="user-id" value="{{ $staff->id }}" hidden>
                                        <button id="edit" type="button" class="btn btn-default">Edit</button>
                                        <button id="update" name="{{ $staff->id }}" type="submit" class="btn btn-default editing" style="display: none">Update</button>
                                        <button id="cancel" type="button" class="btn btn-default editing" style="display: none">Cancel</button>
                                    </div>
                                    <div class="data"></div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $staffs->links() }}
                </div>

            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">快速筛选</h3>
                    </div>
                    <div class="panel-body">
                        active | inactive | suspension | dismission
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection