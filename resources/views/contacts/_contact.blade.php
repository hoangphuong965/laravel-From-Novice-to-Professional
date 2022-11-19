<tr>
    <th scope="row">{{ $loop->index }}</th>
    <td>{{ $contact['firstName'] }}</td>
    <td>{{ $contact['lastName'] }}</td>
    <td>{{ $contact['email'] }}</td>
    <td>{{ $contact['company'] }}</td>
    <td width="150">
        <a href="{{ route('contacts.show', ['id' => $id, 'name' => $contact['firstName']]) }}"
            class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
    </td>
</tr>
