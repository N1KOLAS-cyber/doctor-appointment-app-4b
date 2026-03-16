<div class="flex items-center gap-1">
    <a href="{{ route('admin.doctors.schedules', $doctor) }}" class="inline-flex items-center justify-center rounded-md px-2 py-1 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700" title="Horarios">
        <i class="fa-solid fa-clock"></i>
    </a>
    <a href="{{ route('admin.doctors.edit', $doctor) }}" class="inline-flex items-center justify-center rounded-md px-2 py-1 text-xs font-semibold text-white bg-green-600 hover:bg-green-700" title="Editar">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>
</div>
