<div>
    <form wire:submit.prevent="register">
    <input type="text" wire:model.defer="name" placeholder="Nom" required>
    <input type="email" wire:model.defer="email" placeholder="Email" required>
    <input type="text" wire:model.defer="phone" placeholder="Téléphone">
    <textarea wire:model.defer="address" placeholder="Adresse"></textarea>
    <input type="date" wire:model.defer="date_of_birth">
    <input type="password" wire:model.defer="password" placeholder="Mot de passe" required>
    <input type="password" wire:model.defer="password_confirmation" placeholder="Confirmation" required>
    <button type="submit">Créer mon compte</button>
</form>

</div>
