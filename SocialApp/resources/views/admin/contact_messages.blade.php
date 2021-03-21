<x-adminlayout>
    <h1>Contact Messages Page</h1>
    <table class="table table-hover">
        <thead class="indigo white-text text-center">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Messages</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody class="text-center">

            @foreach ($messages as $message)
                <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->username}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->messages}}</td>
                    <td><a class="btn btn-sm green white-text" href="{{route('editUpdateMessage',$message->id)}}">Update</a></td>
                    <td><a class="btn btn-sm red white-text" href="{{route('deleteMessage',$message->id)}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                </tr>
            @endforeach




        </tbody>
      </table>
</x-adminlayout>
