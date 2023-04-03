<div class="comment">
    <p class="user">{{ $commentaire->user->name }}</p>
    <p class="description">{{ $commentaire->description }}</p>
    <p class="timestamp">{{ $commentaire->created_at->diffForHumans() }}</p>
</div>
