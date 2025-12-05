<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Soporte - Solución Factura</title>
    <meta name="description"
        content="Crea un ticket de soporte para el sistema de facturación electrónica Solución Factura.">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #whatsappTooltip {
            left: 50%;
            transform: translateX(-50%);
        }

        #whatsappTooltip.show {
            animation: modalFadeIn 0.2s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                top: 5rem;
            }

            to {
                opacity: 1;
                top: 6rem;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-white">
    <main class="py-16 md:py-20 lg:py-24 bg-gray-50">
        <div class="w-full max-w-[1400px] mx-auto px-4 sm:px-6 md:px-8 lg:px-10">
            {{-- Header --}}
            <div class="text-center mb-12 md:mb-16">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                    Soporte Técnico
                </h1>
                <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                    Describe tu problema y te responderemos lo antes posible
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="overflow-visible rounded-2xl border-2 border-gray-200 shadow-2xl bg-white backdrop-blur-sm">
                    {{-- Header del formulario --}}
                    <div class="bg-blue-50 p-6 md:p-8 border-b-2 border-gray-200">
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">
                            Crear Ticket de Soporte
                        </h2>
                        <p class="text-sm text-gray-600">
                            Completa el formulario con los detalles de tu problema
                        </p>
                    </div>

                    <form id="ticketForm" class="p-6 md:p-8 lg:p-10">
                        {{-- INBOX oculto --}}
                        <input type="hidden" name="inbox_email" value="soporte@solucion-factura.tickos.dev">

                        {{-- Información de contacto --}}
                        <div class="mb-10">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b-2 border-gray-200">
                                Información de Contacto
                            </h3>
                            <div class="space-y-6">
                                <div>
                                    <label for="customer_email" class="block text-sm font-bold text-gray-900 mb-2.5">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="customer_email" name="customer_email"
                                        placeholder="tu@email.com" required
                                        class="w-full px-4 py-3.5 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="customer_name" class="block text-sm font-bold text-gray-900 mb-2.5">
                                            Nombre completo
                                        </label>
                                        <input type="text" id="customer_name" name="customer_name"
                                            placeholder="Juan Pérez"
                                            class="w-full px-4 py-3.5 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md">
                                    </div>

                                    <div>
                                        <label for="customer_phone"
                                            class="block text-sm font-bold text-gray-900 mb-2.5">
                                            Teléfono <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex flex-row gap-3">
                                            <div class="relative w-24 min-w-[5.5rem]">
                                                <select id="customer_lada" name="customer_lada" required
                                                    class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer shadow-sm hover:shadow-md font-normal appearance-none pr-8">
                                                    <option value="+52">+52</option>
                                                    <option value="+1">+1</option>
                                                </select>
                                                <span
                                                    class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="tel" id="customer_phone" name="customer_phone"
                                                placeholder="5512345678" maxlength="10" required pattern="[0-9]{10}"
                                                class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md font-normal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Detalles del problema --}}
                        <div class="mb-10">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b-2 border-gray-200">
                                Detalles del Problema
                            </h3>
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="customer_group"
                                            class="block text-sm font-bold text-gray-900 mb-2.5">
                                            Sistema afectado
                                        </label>
                                        <div class="relative">
                                            <select id="customer_group" name="customer_group"
                                                class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer shadow-sm hover:shadow-md font-normal appearance-none pr-10">
                                                <option value="">Seleccionar...</option>
                                                <option value="Sistema de facturacion">Sistema de facturación</option>
                                                <option value="Sistema contable">Sistema contable</option>
                                                <option value="Sistema Descarga XML">Sistema Descarga XML</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                            <span
                                                class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="priority" class="block text-sm font-bold text-gray-900 mb-2.5">
                                            Prioridad
                                        </label>
                                        <div class="relative">
                                            {{-- Input oculto para el valor --}}
                                            <input type="hidden" id="priority" name="priority" value="normal">

                                            {{-- Select personalizado --}}
                                            <div id="customPrioritySelect"
                                                class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer shadow-sm hover:shadow-md font-normal flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <span class="w-3 h-3 rounded-full"
                                                        style="background-color: #3b82f6;"></span>
                                                    <span>Normal</span>
                                                </div>
                                                <svg class="w-5 h-5 text-gray-600 transition-transform"
                                                    id="priorityArrow" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>

                                            {{-- Dropdown de opciones --}}
                                            <div id="priorityDropdown"
                                                class="hidden absolute z-10 w-full mt-2 rounded-xl bg-white border-2 border-gray-200 shadow-xl overflow-hidden">
                                                <div class="priority-option px-4 py-3 hover:bg-blue-50 cursor-pointer flex items-center gap-2 transition-colors"
                                                    data-value="normal" data-color="#3b82f6">
                                                    <span class="w-3 h-3 rounded-full"
                                                        style="background-color: #3b82f6;"></span>
                                                    <span class="text-gray-900">Normal</span>
                                                </div>
                                                <div class="priority-option px-4 py-3 hover:bg-blue-50 cursor-pointer flex items-center gap-2 transition-colors"
                                                    data-value="low" data-color="#10b981">
                                                    <span class="w-3 h-3 rounded-full"
                                                        style="background-color: #10b981;"></span>
                                                    <span class="text-gray-900">Baja</span>
                                                </div>
                                                <div class="priority-option px-4 py-3 hover:bg-blue-50 cursor-pointer flex items-center gap-2 transition-colors"
                                                    data-value="medium" data-color="#f59e0b">
                                                    <span class="w-3 h-3 rounded-full"
                                                        style="background-color: #f59e0b;"></span>
                                                    <span class="text-gray-900">Media</span>
                                                </div>
                                                <div class="priority-option px-4 py-3 hover:bg-blue-50 cursor-pointer flex items-center gap-2 transition-colors"
                                                    data-value="high" data-color="#f97316">
                                                    <span class="w-3 h-3 rounded-full"
                                                        style="background-color: #f97316;"></span>
                                                    <span class="text-gray-900">Alta</span>
                                                </div>
                                                <div class="priority-option px-4 py-3 hover:bg-blue-50 cursor-pointer flex items-center gap-2 transition-colors"
                                                    data-value="urgent" data-color="#ef4444">
                                                    <span class="w-3 h-3 rounded-full"
                                                        style="background-color: #ef4444;"></span>
                                                    <span class="text-gray-900">Urgente</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="subject" class="block text-sm font-bold text-gray-900 mb-2.5">
                                        Asunto <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="subject" name="subject" required
                                        placeholder="Resumen breve del problema"
                                        class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm hover:shadow-md font-medium">
                                </div>

                                <div>
                                    <label for="message" class="block text-sm font-bold text-gray-900 mb-2.5">
                                        Descripción del problema <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="message" name="message" required
                                        placeholder="Describe detalladamente qué sucedió, qué esperabas que sucediera y los pasos para reproducir el problema..."
                                        rows="6"
                                        class="w-full px-4 py-3 rounded-xl bg-white border-2 border-gray-200 text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all resize-y shadow-sm hover:shadow-md font-medium"></textarea>
                                    <p class="mt-2.5 text-xs text-gray-600">
                                        Incluye capturas de pantalla o archivos relevantes abajo
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Asignar a (oculto) --}}
                        <input type="hidden" name="assigned_to" value="contacto@solucionfiscal.mx">

                        {{-- Metadatos ocultos --}}
                        <input type="hidden" name="metadata[user_id]" value="">
                        <input type="hidden" name="metadata[plan]" value="">
                        <input type="hidden" name="metadata[browser]" value="">
                        <input type="hidden" name="metadata[os]" value="">
                        <input type="hidden" name="metadata[source]" value="">

                        {{-- Adjuntos --}}
                        <div class="mb-10">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b-2 border-gray-200">
                                Archivos Adjuntos (Opcional)
                            </h3>

                            {{-- Input real oculto --}}
                            <input type="file" id="attachments" multiple class="hidden">

                            {{-- Dropzone visible --}}
                            <div id="dropZone"
                                class="border-2 border-dashed border-gray-300 rounded-lg p-5 text-center cursor-pointer bg-blue-50 transition-all hover:border-blue-500 hover:bg-blue-100 hover:shadow-md group">
                                <svg class="mx-auto h-8 w-8 text-gray-600 group-hover:text-blue-500 transition-colors"
                                    stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-900 font-medium">
                                    Arrastra archivos o haz clic para seleccionar
                                </p>
                                <p class="mt-1 text-xs text-gray-700">
                                    PNG, JPG, PDF hasta 10MB
                                </p>
                            </div>
                            <div id="fileList" class="mt-4 space-y-2"></div>
                        </div>

                        {{-- Botón de envío --}}
                        <div class="flex justify-center pt-4">
                            <button type="submit"
                                class="px-10 py-4 bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold text-lg rounded-xl transition-all hover:shadow-2xl hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500/50 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0">
                                Enviar Ticket de Soporte
                            </button>
                        </div>
                    </form>

                    {{-- Respuesta del servidor --}}
                    <div id="responseContainer" class="hidden border-t-2 border-gray-200 p-6 md:p-8">
                        <div class="flex items-start gap-4">
                            <div id="responseIcon" class="flex-shrink-0 mt-1"></div>
                            <div class="flex-1 min-w-0">
                                <h3 id="responseTitle" class="text-base font-bold text-gray-900 mb-2">
                                </h3>
                                <pre id="responseBox"
                                    class="text-sm text-gray-700 whitespace-pre-wrap font-mono overflow-auto max-h-60"></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Modal de WhatsApp --}}
    <div id="whatsappTooltip"
        class="hidden fixed z-50 p-5 bg-green-100 border-2 border-green-500 rounded-xl shadow-2xl w-[90%] max-w-md"
        style="top: 6rem;">
        <div class="flex items-start gap-3">
            <svg class="w-6 h-6 text-green-700 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z">
                </path>
            </svg>
            <div class="flex-1">
                <p class="text-sm font-bold text-gray-900 mb-1.5 flex items-center gap-2">
                    📱 Notificaciones por WhatsApp
                </p>
                <p class="text-xs text-gray-900 leading-relaxed">
                    Si deseas recibir notificaciones de respuesta por WhatsApp, ingresa tu número de WhatsApp activo.
                </p>
            </div>
            <button id="closeTooltip" type="button"
                class="flex-shrink-0 w-6 h-6 rounded-lg flex items-center justify-center text-gray-900 hover:bg-green-200 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Alert personalizado --}}
    <div id="customAlert" class="fixed inset-0 z-50 flex items-center justify-center hidden"
        style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="bg-white rounded-2xl shadow-2xl border-2 border-green-500 p-8 max-w-md mx-4 transform transition-all scale-95 opacity-0"
            id="alertContent">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                    <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">
                    ¡Ticket enviado exitosamente!
                </h3>
                <p class="text-base text-gray-800 mb-6">
                    Tu solicitud ha sido recibida. Nos pondremos en contacto contigo pronto.
                </p>
                <button id="closeAlert"
                    class="w-full px-6 py-3 bg-gradient-to-br from-green-500 to-green-600 text-white font-bold rounded-xl transition-all hover:shadow-xl hover:-translate-y-0.5">
                    Entendido
                </button>
            </div>
        </div>
    </div>

    <script>
        // ------------ 🔧 CONFIGURACIÓN ------------
        const WEBHOOK_URL = "https://flow.wabotify.com/webhook/create-ticket";

        // ------------ 📌 Convertir archivos a Base64 ------------
        function toBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = () => resolve({
                    fileName: file.name,
                    fileData: reader.result.split(',')[1],
                    contentType: file.type
                });
                reader.onerror = reject;
                reader.readAsDataURL(file);
            });
        }

        // ------------ 💬 Modal de WhatsApp ------------
        const phoneInput = document.getElementById('customer_phone');
        const whatsappTooltip = document.getElementById('whatsappTooltip');
        const closeTooltipBtn = document.getElementById('closeTooltip');

        function showWhatsAppModal() {
            if (whatsappTooltip) {
                whatsappTooltip.classList.remove('hidden');
                whatsappTooltip.classList.add('show');
            }
        }

        function hideWhatsAppModal() {
            if (whatsappTooltip) {
                whatsappTooltip.classList.remove('show');
                whatsappTooltip.classList.add('hidden');
            }
        }

        phoneInput?.addEventListener('focus', () => {
            showWhatsAppModal();
        });

        closeTooltipBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            hideWhatsAppModal();
        });

        document.addEventListener('click', (e) => {
            const target = e.target;
            if (whatsappTooltip && !whatsappTooltip.contains(target) && target !== phoneInput && !whatsappTooltip.classList.contains('hidden')) {
                hideWhatsAppModal();
            }
        });

        // ------------ 📁 Manejo de drag & drop ------------
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('attachments');
        const fileList = document.getElementById('fileList');
        let selectedFiles = [];

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('!border-blue-500', '!bg-blue-100');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('!border-blue-500', '!bg-blue-100');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('!border-blue-500', '!bg-blue-100');
            if (e.dataTransfer?.files && e.dataTransfer.files.length > 0) {
                selectedFiles = Array.from(e.dataTransfer.files);
                renderFileList();
            }
        });

        fileInput.addEventListener('change', (e) => {
            if (e.target.files) {
                selectedFiles = Array.from(e.target.files);
                renderFileList();
            }
        });

        function renderFileList() {
            if (!selectedFiles.length) {
                fileList.innerHTML = '';
                return;
            }
            fileList.innerHTML = '';
            selectedFiles.forEach((file, idx) => {
                const line = document.createElement('div');
                line.className = 'flex items-center gap-3 p-4 bg-white rounded-xl border-2 border-gray-200 group hover:border-blue-500/50 hover:shadow-lg transition-all';

                const fileIcon = document.createElement('div');
                fileIcon.className = 'flex-shrink-0 w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-lg';
                fileIcon.textContent = getFileIcon(file.type);

                const fileDetails = document.createElement('div');
                fileDetails.className = 'flex-1 min-w-0';

                const fileName = document.createElement('p');
                fileName.className = 'text-sm font-medium text-gray-900 truncate';
                fileName.textContent = file.name;

                const fileSize = document.createElement('p');
                fileSize.className = 'text-xs text-gray-700 mt-0.5';
                fileSize.textContent = formatFileSize(file.size);

                fileDetails.appendChild(fileName);
                fileDetails.appendChild(fileSize);

                const removeBtn = document.createElement('button');

                removeBtn.type = 'button';
                removeBtn.className = 'flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:text-red-500 hover:bg-red-500/10 transition-colors opacity-0 group-hover:opacity-100';
                removeBtn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                removeBtn.onclick = () => {
                    selectedFiles.splice(idx, 1);
                    renderFileList();
                };

                line.appendChild(fileIcon);
                line.appendChild(fileDetails);
                line.appendChild(removeBtn);
                fileList.appendChild(line);
            });
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round((bytes / Math.pow(k, i)) * 100) / 100 + ' ' + sizes[i];
        }

        function getFileIcon(mimeType) {
            if (mimeType.startsWith('image/')) return '🖼️';
            if (mimeType.startsWith('video/')) return '🎥';
            if (mimeType.startsWith('audio/')) return '🎵';
            if (mimeType.includes('pdf')) return '📄';
            if (mimeType.includes('word') || mimeType.includes('document')) return '📝';
            if (mimeType.includes('excel') || mimeType.includes('spreadsheet')) return '📊';
            if (mimeType.includes('zip') || mimeType.includes('rar') || mimeType.includes('compressed')) return '📦';
            return '📎';
        }

        // ------------ 🚀 Enviar formulario ------------
        document.getElementById('ticketForm')?.addEventListener('submit', async (e) => {
            e.preventDefault();

            const form = e.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const responseContainer = document.getElementById('responseContainer');
            const responseIcon = document.getElementById('responseIcon');
            const responseTitle = document.getElementById('responseTitle');
            const responseBox = document.getElementById('responseBox');
            const originalBtnContent = submitBtn.innerHTML;

            // Deshabilitar botón y mostrar loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Enviando...
            `;

            // Mostrar mensaje de carga
            responseContainer.classList.remove('hidden');
            responseContainer.className = 'mt-6 p-6 bg-blue-50 border border-blue-200 rounded-lg';
            responseIcon.innerHTML = '<svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            responseTitle.textContent = 'Enviando ticket...';
            responseTitle.className = 'text-sm font-semibold text-gray-900 mb-1';
            responseBox.textContent = 'Por favor espera mientras procesamos tu solicitud.';
            responseBox.className = 'text-xs text-gray-800';

            const formData = new FormData(form);

            // Metadatos
            const metadata = {
                user_id: formData.get('metadata[user_id]') || '',
                plan: formData.get('metadata[plan]') || '',
                browser: formData.get('metadata[browser]') || '',
                os: formData.get('metadata[os]') || '',
                source: formData.get('metadata[source]') || ''
            };

            // Adjuntos desde selectedFiles
            const attachments = [];
            for (let f of selectedFiles) {
                attachments.push(await toBase64(f));
            }

            // Formatear el número de WhatsApp
            let lada = form.querySelector('[name="customer_lada"]')?.value || '+52';
            let phone = (formData.get('customer_phone') || '').replace(/[^0-9]/g, '');
            let customer_phone = '';
            if (lada === '+52' && phone.length === 10) {
                customer_phone = `+521${phone}`;
            } else if (lada === '+1' && phone.length === 10) {
                customer_phone = `+11${phone}`;
            } else {
                customer_phone = `${lada}${phone}`;
            }

            // JSON final
            const body = {
                inbox_email: formData.get('inbox_email'),
                customer_email: formData.get('customer_email'),
                customer_name: formData.get('customer_name'),
                customer_phone,
                customer_group: formData.get('customer_group'),
                subject: formData.get('subject'),
                message: formData.get('message'),
                priority: formData.get('priority'),
                assigned_to: formData.get('assigned_to'),
                metadata,
                attachments
            };

            try {
                const res = await fetch(WEBHOOK_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(body)
                });

                const data = await res.json();

                if (res.ok) {
                    // Éxito
                    responseContainer.className = 'mt-6 p-6 bg-green-100 border border-green-300 rounded-lg';
                    responseIcon.innerHTML = '<svg class="h-5 w-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                    responseTitle.textContent = '¡Ticket creado exitosamente!';
                    responseTitle.className = 'text-sm font-semibold text-gray-900 mb-1';
                    responseBox.textContent = 'Tu ticket ha sido enviado. Nos pondremos en contacto contigo pronto.\n\nID: ' + (data.id || 'N/A');
                    responseBox.className = 'text-xs text-gray-900';

                    // Mostrar alert personalizado
                    showCustomAlert();

                    // Scroll al inicio de la página
                    window.scrollTo({ top: 0, behavior: 'smooth' });

                    // Resetear formulario
                    form.reset();
                    selectedFiles = [];
                    renderFileList();
                    responseContainer.classList.add('hidden');
                } else {
                    // Error del servidor
                    responseContainer.className = 'mt-6 p-6 bg-red-50 border border-red-200 rounded-lg';
                    responseIcon.innerHTML = '<svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                    responseTitle.textContent = 'Error al crear el ticket';
                    responseTitle.className = 'text-sm font-semibold text-gray-900 mb-1';
                    responseBox.textContent = data.message || 'Ocurrió un error al procesar tu solicitud. Por favor inténtalo de nuevo.';
                    responseBox.className = 'text-xs text-gray-900 whitespace-pre-wrap font-mono';
                }
            } catch (err) {
                // Error de conexión
                responseContainer.className = 'mt-6 p-6 bg-red-50 border border-red-200 rounded-lg';
                responseIcon.innerHTML = '<svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                responseTitle.textContent = 'Error de conexión';
                responseTitle.className = 'text-sm font-semibold text-gray-900 mb-1';
                responseBox.textContent = 'No se pudo conectar con el servidor. Verifica tu conexión a internet e inténtalo de nuevo.';
                responseBox.className = 'text-xs text-gray-900';
            } finally {
                // Restaurar botón
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnContent;
            }
        });

        // ------------ 🎨 Funciones para el alert personalizado ------------
        function showCustomAlert() {
            const alertOverlay = document.getElementById('customAlert');
            const alertContent = document.getElementById('alertContent');

            if (alertOverlay && alertContent) {
                alertOverlay.classList.remove('hidden');
                setTimeout(() => {
                    alertContent.style.transform = 'scale(1)';
                    alertContent.style.opacity = '1';
                }, 10);
            }
        }

        function closeCustomAlert() {
            const alertOverlay = document.getElementById('customAlert');
            const alertContent = document.getElementById('alertContent');

            if (alertOverlay && alertContent) {
                alertContent.style.transform = 'scale(0.95)';
                alertContent.style.opacity = '0';
                setTimeout(() => {
                    alertOverlay.classList.add('hidden');
                }, 200);
            }
        }

        // Event listener para cerrar el alert
        document.getElementById('closeAlert')?.addEventListener('click', closeCustomAlert);

        // Cerrar al hacer click fuera del alert
        document.getElementById('customAlert')?.addEventListener('click', (e) => {
            if (e.target === e.currentTarget) {
                closeCustomAlert();
            }
        });

        // ------------ 🎨 Select personalizado de prioridad ------------
        const customPrioritySelect = document.getElementById('customPrioritySelect');
        const priorityDropdown = document.getElementById('priorityDropdown');
        const priorityInput = document.getElementById('priority');
        const priorityArrow = document.getElementById('priorityArrow');
        const priorityOptions = document.querySelectorAll('.priority-option');

        // Toggle dropdown
        customPrioritySelect?.addEventListener('click', (e) => {
            e.stopPropagation();
            priorityDropdown.classList.toggle('hidden');
            priorityArrow.classList.toggle('rotate-180');
        });

        // Seleccionar opción
        priorityOptions.forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation();
                const value = option.getAttribute('data-value');
                const color = option.getAttribute('data-color');
                const text = option.querySelector('span:last-child').textContent;

                // Actualizar input oculto
                priorityInput.value = value;

                // Actualizar select visual
                const colorCircle = customPrioritySelect.querySelector('.w-3');
                const textSpan = customPrioritySelect.querySelector('span:last-child');
                colorCircle.style.backgroundColor = color;
                textSpan.textContent = text;

                // Cerrar dropdown
                priorityDropdown.classList.add('hidden');
                priorityArrow.classList.remove('rotate-180');
            });
        });

        // Cerrar dropdown al hacer click fuera
        document.addEventListener('click', (e) => {
            if (!customPrioritySelect?.contains(e.target) && !priorityDropdown?.contains(e.target)) {
                priorityDropdown?.classList.add('hidden');
                priorityArrow?.classList.remove('rotate-180');
            }
        });
    </script>
</body>

</html>
