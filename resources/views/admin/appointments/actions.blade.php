<div class="flex items-center gap-2 flex-nowrap" style="min-width: 80px;">
    <a href="{{ route('admin.appointments.edit', $appointment) }}" class="inline-flex flex-shrink-0 items-center justify-center rounded w-8 h-8 text-white" style="background-color:#2563eb;" title="Editar">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>
    <a href="{{ route('admin.appointments.consultation', $appointment) }}" class="inline-flex flex-shrink-0 items-center justify-center rounded w-8 h-8 text-white" style="background-color:#16a34a;" title="Atender consulta">
        <i class="fa-regular fa-clock"></i>
    </a>
</div>
