<flux:modal name="project-modal" class="md:w-[32rem]">
    <form wire:submit="saveProject" class="space-y-6">
        <div>
            <flux:heading class="font-bold" size="lg">Create Project</flux:heading>
            <flux:text class="mt-2">Add new project using the form below.</flux:text>
        </div>

        <!-- Project Name -->
        <div class="form-group">
            <flux:input wire:model="name" label="Project Name" placeholder="Enter project name"/>
        </div>

        <!-- Description -->
        <div class="form-group">
            <flux:textarea wire:model="description" label="Description" placeholder="Short Project description" rows="3"/>
        </div>

        <!-- Deadline date -->
        <div class="form-group">
            <flux:input type="date" wire:model="deadline" label="Deadline" />
        </div>

        <!-- Status -->
        <div class="form-group">
            <flux:select wire:model="status" label="Status" placeholder="Choose status...">
                <flux:select.option value="pending">Pending</flux:select.option>
                <flux:select.option value="in-progress">In-Progress</flux:select.option>
                <flux:select.option value="competed">Competed</flux:select.option>
                <flux:select.option value="cancelled">Cancelled</flux:select.option>
            </flux:select>
        </div>

        <!-- Project Logo -->
        <div class="form-group">
            <flux:input type="file" wire:model="project_logo" class="cursor-pointer" accept="image/*" label="Project Logo" />
        </div>

        <div class="flex justify-end pt-4">
            <flux:spacer/>

            <flux:modal.close>
                <flux:button variant="ghost" class="cursor-pointer">Cancel</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="primary" color="indigo" class="cursor-pointer ms-2">Save Project</flux:button>
        </div>
    </form>
</flux:modal>

