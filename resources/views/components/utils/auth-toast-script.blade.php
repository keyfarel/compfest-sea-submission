{{--@once--}}
{{--    <script>--}}
{{--        document.addEventListener('livewire:load', () => {--}}
{{--            const showToast = (type, message) => {--}}
{{--                const isMobile = window.innerWidth < 768;--}}
{{--                Toastify({--}}
{{--                    text: message,--}}
{{--                    duration: 3000,--}}
{{--                    close: true,--}}
{{--                    gravity: "top",--}}
{{--                    position: isMobile ? "center" : "right",--}}
{{--                    stopOnFocus: true,--}}
{{--                    style: { background: type === 'success' ? '#16a34a' : '#dc2626' },--}}
{{--                }).showToast();--}}
{{--            };--}}

{{--            // Tangkap browser events--}}
{{--            window.addEventListener('show-toast', event => {--}}
{{--                showToast(event.detail.type, event.detail.message);--}}
{{--            });--}}

{{--            window.addEventListener('redirect-after-toast', event => {--}}
{{--                setTimeout(() => {--}}
{{--                    window.location.href = event.detail.url;--}}
{{--                }, 2000);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endonce--}}
