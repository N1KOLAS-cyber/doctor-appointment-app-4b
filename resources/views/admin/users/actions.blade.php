@if(isset($user) && $user)
<div class="flex items-center space-x-2">
    <!-- Botón Editar -->
    <x-button href="{{ route('admin.users.edit', $user) }}" color="blue" size="xs">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-button>
    <!-- Botón Eliminar (siempre visible, pero protegido) -->
    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" 
          class="delete-form {{ $user->email === 'nicolasprueba@gmail.com' ? 'protected-user' : '' }}"
          data-user-email="{{ $user->email }}">
        @csrf
        @method('DELETE')
        <x-button type="submit" color="red" size="xs">
            <i class="fa-solid fa-trash"></i>
        </x-button>
    </form>
</div>
@endif
