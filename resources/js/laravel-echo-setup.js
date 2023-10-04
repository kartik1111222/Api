import Echo from 'laravel-echo';
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ":" + window.laravel_echo_port,
    enabledTransports: ['ws', 'wss'],
    disableStats: true,
    forceTLS: false,
    transports: ['websocket', 'polling', 'flashsocket'] 
});