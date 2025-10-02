<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Project Management</flux:heading>
        <flux:subheading size="lg" class="mb-6">Create and manage your projects</flux:subheading>
        <flux:separator variant="subtle"/>
    </div>

    <!-- button Add Project -->
    <div class="text-end mb-4">
        <flux:modal.trigger name="project-modal">
            <flux:button variant="primary" color="indigo" icon="plus-circle" class="cursor-pointer">Add Project</flux:button>
        </flux:modal.trigger>
    </div>

    <!-- Render form component (with flux modal comp.) -->
    <livewire:projects.form-modal />

</div>