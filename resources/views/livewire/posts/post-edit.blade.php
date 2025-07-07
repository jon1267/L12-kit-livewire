<section>

    <!-- class = bg-slate-900 -->
    <form wire:submit="updatePost" class="flex flex-col gap-6 max-w-3xl mx-auto shadow-2xl rounded-2xl p-4">

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

        <div class="flex gap-4">
            <img src="{{ asset('storage/'.$form->post->image) }}" class="w-18 h-18 rounded-2xl {{ $form->image ? 'opacity-30':'' }}" alt="Image" title="Old image">
            @if ( $form->image )
                <img src="{{ $form->image->temporaryUrl() }}" class="w-18 h-18 rounded-2xl" alt="Image" title="New image">
            @endif
        </div>

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">Update</flux:button>
        </div>
    </form>
</section>

