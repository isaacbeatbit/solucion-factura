<!doctype html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Usuario</title>
    <meta name="description" content="Formulario de usuario independiente con Tailwind CDN." />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-gray-50">
    <main class="py-12">
        <div class="max-w-xl mx-auto p-6 bg-white rounded-2xl border border-gray-200 shadow-xl">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Registro de Usuario</h1>
                <p class="text-gray-600">Completa tus datos para crear tu usuario</p>
            </div>
            <div id="form-wrapper" class="space-y-6">
                <form id="usuario-form" class="space-y-6">
                    <div>
                        <label for="nombre" class="block text-sm font-semibold text-gray-900 mb-2">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Juan Pérez" required
                            class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md" />
                    </div>
                    <div>
                        <label for="correo" class="block text-sm font-semibold text-gray-900 mb-2">Correo</label>
                        <input type="email" id="correo" name="correo" placeholder="tu@empresa.com" required
                            class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md" />
                    </div>
                    <div>
                        <label for="rfc" class="block text-sm font-semibold text-gray-900 mb-2">RFC</label>
                        <input type="text" id="rfc" name="rfc" placeholder="XAXX010101000" minlength="12" maxlength="13"
                            required
                            class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md uppercase" />
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required
                            class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md" />
                    </div>
                    <button type="submit"
                        class="w-full py-3 font-semibold text-base px-6 bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-xl hover:from-cyan-600 hover:to-blue-600 transition-all shadow-lg hover:shadow-xl cursor-pointer">Crear
                        usuario</button>
                </form>
                <div id="error-box"
                    class="hidden rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"></div>
            </div>
            <div id="feedback" class="hidden text-center space-y-4">
                <p id="feedback-message" class="text-base text-gray-700"></p>
                <p id="feedback-countdown" class="hidden text-sm text-gray-600"></p>
                <div id="code-1-actions" class="hidden flex flex-row flex-wrap gap-3 mt-4 w-full">
                    <a id="btn-comprar-modulo" href="#"
                        class="flex-1 whitespace-nowrap inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold text-base bg-gradient-to-r from-emerald-500 to-emerald-600 text-white hover:from-emerald-600 hover:to-emerald-700 transition-all shadow-lg cursor-pointer">Comprar
                        modulo individual</a>
                    <a href="/#planes"
                        class="flex-1 whitespace-nowrap inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold text-base border-2 border-blue-500 text-blue-600 hover:bg-blue-50 transition-all cursor-pointer">Actualizar
                        mi plan</a>
                </div>
            </div>
        </div>
    </main>
    <script>
        const form = document.getElementById("usuario-form");
        const formWrapper = document.getElementById("form-wrapper");
        const feedback = document.getElementById("feedback");
        const feedbackMessage = document.getElementById("feedback-message");
        const feedbackCountdown = document.getElementById("feedback-countdown");
        const errorBox = document.getElementById("error-box");
        const checkoutBaseUrl = "https://pagos.solucionfiscal.online/subscribe/698cfb2b8118f11d5408f32a/modulo-envia-facturas-por-whatsapp";
        const comprarModuloButton = document.getElementById("btn-comprar-modulo");
        const createCheckoutToken = () => window.crypto?.randomUUID?.() ?? `${Date.now()}-${Math.random().toString(16).slice(2)}`;

        comprarModuloButton?.addEventListener("click", (event) => {
            const finalToken = sessionStorage.getItem("checkout_modulo_token");
            if (!finalToken) {
                event.preventDefault();
                return;
            }
            const url = new URL(checkoutBaseUrl);
            url.searchParams.set("token", finalToken);
            comprarModuloButton.href = url.toString();
            window.location.href = url.toString();
        });
        form?.addEventListener("submit", async (event) => {
            event.preventDefault();
            if (errorBox) {
                errorBox.textContent = "";
                errorBox.classList.add("hidden");
            }
            if (feedbackCountdown) {
                feedbackCountdown.textContent = "";
                feedbackCountdown.classList.add("hidden");
            }

            const formData = new FormData(form);
            const correo = formData.get("correo");
            const token = createCheckoutToken();
            sessionStorage.setItem("checkout_modulo_token", token);
            if (comprarModuloButton) {
                const url = new URL(checkoutBaseUrl);
                url.searchParams.set("token", token);
                comprarModuloButton.href = url.toString();
            }
            const payload = {
                nombre: formData.get("nombre"),
                correo,
                rfc: formData.get("rfc"),
                password: formData.get("password"),
                origin: "solucion_factura",
                token,
            };
            try {
                const res = await fetch("https://flow.wabotify.com/webhook/6ff754fd-72bb-4f96-a8da-16e90d2df4ae", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload),
                });
                const result = await res.json();

                if (result?.success === true && result?.code === 1) {
                    if (formWrapper) formWrapper.classList.add("hidden");
                    if (feedback) feedback.classList.remove("hidden");
                    if (feedbackMessage) {
                        feedbackMessage.textContent = `Tu usuario se está creando con tu correo ${correo} y la contraseña que introduciste.`;
                    }
                    if (feedbackCountdown) {
                        let remaining = 10;
                        feedbackCountdown.textContent = `Serás redirigido en ${remaining} segundos.`;
                        feedbackCountdown.classList.remove("hidden");
                        const intervalId = window.setInterval(() => {
                            remaining -= 1;
                            if (remaining <= 0) {
                                window.clearInterval(intervalId);
                            } else {
                                feedbackCountdown.textContent = `Serás redirigido en ${remaining} segundos.`;
                            }
                        }, 1000);
                    }
                    window.setTimeout(() => {
                        window.location.href = "https://app.wabotify.ai/#/login";
                    }, 10000);
                    return;
                }

                if (result?.success === false && result?.code === 1) {
                    if (formWrapper) formWrapper.classList.add("hidden");
                    if (feedback) feedback.classList.remove("hidden");
                    if (feedbackMessage) {
                        feedbackMessage.innerHTML = "Con tu plan actual puedes adquirir este modulo por <strong>$1042 MXN</strong> o puedes actualizar tu plan a <strong>Premium</strong> o <strong>Premium Plus</strong> para tener este modulo incluido";
                    }
                    const code1Actions = document.getElementById("code-1-actions");
                    if (code1Actions) code1Actions.classList.remove("hidden");
                    return;
                }

                if (result?.success === false && result?.code === 2) {
                    if (errorBox) {
                        errorBox.textContent = "Correo o RFC incorrectos, intenta de nuevo.";
                        errorBox.classList.remove("hidden");
                    }
                    return;
                }

                if (errorBox) {
                    errorBox.textContent = "Ocurrió un error al procesar la solicitud. Intenta de nuevo.";
                    errorBox.classList.remove("hidden");
                }
            } catch (e) {
                if (errorBox) {
                    errorBox.textContent = "No se pudo conectar con el servidor. Intenta de nuevo.";
                    errorBox.classList.remove("hidden");
                }
            }
        });

    </script>
</body>

</html>
