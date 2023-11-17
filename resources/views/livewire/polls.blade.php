<div>
    @forelse ($polls as $poll)
      <div class="mb-4 bg-slate-100 rounded-md p-2">
        <h3 class="mb-1 text-xl">
          {{ $poll->title }}
        </h3>
        @foreach ($poll->options as $option)
          <div class="mb-4">
            <button class="btn"
              wire:click="vote({{ $option->id }})">Vote</button>
            {{ $option->name }} ({{ $option->votes->count() }})
          </div>
        @endforeach
      </div>
      <hr class="mb-4"/>
    @empty
      <div class="text-gray-500">
        No polls available
      </div>
    @endforelse
  </div>