<section>

    <!-- class = bg-slate-900 -->
    <form wire:submit="savePost" class="flex flex-col gap-6 max-w-3xl mx-auto shadow-2xl rounded-2xl p-4">

        <!-- Title -->
        <flux:input
                wire:model="form.title"
                label="Post Title"
                type="text"
                autofocus
                autocomplete="title"
                placeholder="Post Title"
        />


        <!-- Content -->
        <flux:textarea
                wire:model="form.content"
                label="Post Content"
                name="content"
                rows="5"
                placeholder="Write your post content here..."
        />


        <!-- Image time 18:00  -->
        <flux:input
                wire:model="form.image"
                label="Image"
                type="file"
        />

        <div>
            @if ( $form->image )
                <img src="{{ $form->image->temporaryUrl() }}" class="w-16 h-16 rounded-2xl" alt="Image">
            @endif
        </div>

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">Create</flux:button>
        </div>
    </form>
</section>
