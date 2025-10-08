<flux:modal name="project-modal" class="md:w-[32rem]">
    <form wire:submit="saveProject" class="space-y-6">
        <div>
            <flux:heading class="font-bold" size="lg">{{ $isView ? 'Project Details' : ($projectId ? 'Update ':'Create ').'Project' }}</flux:heading>
            <flux:text class="mt-2">Add new project using the form below.</flux:text>
        </div>

        <!-- Project Name -->
        <div class="form-group">
            <flux:input :disabled="$isView" wire:model="name" label="Project Name" placeholder="Enter project name"/>
        </div>

        <!-- Description -->
        <div class="form-group">
            <flux:textarea :disabled="$isView" wire:model="description" label="Description" placeholder="Short Project description" rows="3"/>
        </div>

        <!-- Deadline date -->
        <div class="form-group">
            <flux:input :disabled="$isView" type="date" wire:model="deadline" label="Deadline" />
        </div>

        <!-- Status -->
        <div class="form-group">
            <flux:select :disabled="$isView" wire:model="status" label="Status" placeholder="Choose status...">
                <flux:select.option value="pending">Pending</flux:select.option>
                <flux:select.option value="in-progress">In-Progress</flux:select.option>
                <flux:select.option value="competed">Completed</flux:select.option>
                <flux:select.option value="cancelled">Cancelled</flux:select.option>
            </flux:select>
        </div>

        <!-- Project Logo -->
        <div class="form-group">
            @if(!$isView)
                <flux:input type="file" wire:model="project_logo" class="cursor-pointer"
                    accept="image/*" label="Project Logo" />
            @endif

            <!-- Preview Logo -->
            @if ($project_logo && !$errors->has('project_logo'))
                <img src="{{ $project_logo->temporaryUrl() }}" class="w-18 h-18 rounded-sm m-2" alt="Project Logo">
            @elseif($projectId && $existingImage)
                <img src="{{ asset('storage/' . $existingImage) }}" class="w-18 h-18 rounded-sm m-2" alt="Project Logo">

            @endif
        </div>

        <div class="flex justify-end pt-4">
            <flux:spacer/>

            <flux:modal.close>
                <flux:button variant="ghost" class="cursor-pointer">Cancel</flux:button>
            </flux:modal.close>

            @if(!$isView)
                <flux:button type="submit" variant="primary" color="indigo" class="cursor-pointer ms-2">
                    {{ $projectId ? 'Update ' : 'Save ' }} Project
                </flux:button>
            @endif
        </div>
    </form>
</flux:modal>

