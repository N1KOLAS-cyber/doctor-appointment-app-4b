<div class="flex items-center space-x-2">
    <x-button href="{{ route('admin.roles.edit', $role) }}" color="blue" size="xs">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>

    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" 
          class="delete-form {{ $role->id <= 4 ? 'protected-role' : '' }}"
          data-role-id="{{ $role->id }}">
        @csrf
        @method('DELETE')
        <x-button type="submit" color="red" size="xs">
            <i class="fa-solid fa-trash"></i>
        </x-button>
    </form>
</div>
