import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Import Laravel Echo
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;
// Configure Laravel Echo with Reverb
window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST || window.location.hostname,
    wsPort: import.meta.env.VITE_REVERB_PORT || 6001,
    wssPort: import.meta.env.VITE_REVERB_PORT || 6001,
    forceTLS: import.meta.env.VITE_REVERB_SCHEME === 'https',
    disableStats: true,
    enabledTransports: ['ws', 'wss'], // Ensure compatibility with WebSocket transport
});
