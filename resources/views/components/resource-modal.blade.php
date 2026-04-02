<div id="resourceModal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl mx-4 overflow-hidden">

        <!-- Header -->
        <div class="flex justify-between items-center px-5 py-3 bg-gray-900 text-white">
            <h3 id="resourceModalTitle" class="font-bold text-sm"></h3>
            <button id="closeResourceModal">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Body -->
        <div id="resourceModalBody" class="p-4 max-h-[70vh] overflow-auto text-sm text-gray-700"></div>

        <!-- Footer (ONLY for TEXT) -->
        <div id="resourceModalFooter" class="hidden px-4 py-3 border-t flex justify-end gap-2 bg-gray-50">
            <button id="copyTextBtn"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg text-xs font-semibold flex items-center gap-2">
                <i class="fas fa-copy"></i> Copy
            </button>

            <button id="downloadPdfBtn"
                    class="px-4 py-2 bg-orange-500 text-white rounded-lg text-xs font-semibold flex items-center gap-2">
                <i class="fas fa-file-pdf"></i> Download PDF
            </button>
        </div>

    </div>
</div>
