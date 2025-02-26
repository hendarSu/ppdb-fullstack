<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="w-100" style="max-width: 600px;">
        <div class="text-center mb-4">
            <h3>Payment Gateway Settings</h3>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form wire:submit.prevent="saveSettings">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="provider" class="form-label">Provider</label>
                        <input type="text" id="provider" class="form-control" wire:model="provider" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="merchantId" class="form-label">Merchant ID</label>
                        <input type="text" id="merchantId" class="form-control" wire:model="merchantId">
                    </div>
                    <div class="mb-3">
                        <label for="clientKey" class="form-label">Client Key</label>
                        <div class="input-group">
                            <input type="password" id="clientKey" class="form-control" wire:model="clientKey">
                            <button type="button" class="btn btn-outline-primary" onclick="toggleVisibility('clientKey')">
                                <i class="mdi mdi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="serverKey" class="form-label">Server Key</label>
                        <div class="input-group">
                            <input type="password" id="serverKey" class="form-control" wire:model="serverKey">
                            <button type="button" class="btn btn-outline-primary" onclick="toggleVisibility('serverKey')">
                                <i class="mdi mdi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <script>
                        function toggleVisibility(id) {
                            var input = document.getElementById(id);
                            if (input.type === "password") {
                                input.type = "text";
                            } else {
                                input.type = "password";
                            }
                        }
                    </script>
                    <div class="mb-3 form-check">
                        <input type="checkbox" id="isEnabled" class="form-check-input" wire:model="isEnabled" @if($isEnabled) checked @endif>
                        <label for="isEnabled" class="form-check-label">Is Enabled</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>
