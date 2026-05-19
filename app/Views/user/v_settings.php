<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header">
        <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua mb-2">Pengaturan Sistem</h2>
        <p class="text-gray-600">Kelola konfigurasi dan preferensi sistem BUMDes</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-1">
                <nav class="space-y-1">
                    <button class="settings-tab w-full text-left px-4 py-3 rounded-xl font-medium text-hijau-utama bg-hijau-pastel transition-all" data-tab="umum">
                        <i class="fas fa-cog w-5 inline-block mr-3"></i>
                        Pengaturan Umum
                    </button>
                    <button class="settings-tab w-full text-left px-4 py-3 rounded-xl font-medium text-gray-600 hover:text-hijau-utama hover:bg-gray-50 transition-all" data-tab="keamanan">
                        <i class="fas fa-shield-alt w-5 inline-block mr-3"></i>
                        Keamanan
                    </button>
                    <button class="settings-tab w-full text-left px-4 py-3 rounded-xl font-medium text-gray-600 hover:text-hijau-utama hover:bg-gray-50 transition-all" data-tab="notifikasi">
                        <i class="fas fa-bell w-5 inline-block mr-3"></i>
                        Notifikasi
                    </button>
                    <button class="settings-tab w-full text-left px-4 py-3 rounded-xl font-medium text-gray-600 hover:text-hijau-utama hover:bg-gray-50 transition-all" data-tab="backup">
                        <i class="fas fa-database w-5 inline-block mr-3"></i>
                        Backup Data
                    </button>
                </nav>
            </div>
        </div>

        <!-- Content Area -->
        <div class="lg:col-span-2">
            <!-- Tab Umum -->
            <div class="settings-content bg-white rounded-2xl shadow-lg p-6" id="umum-tab">
                <h3 class="text-xl font-semibold text-hijau-tua mb-6">Pengaturan Umum</h3>
                
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-hijau-tua font-medium mb-2">Nama BUMDes</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="BUMDes Maju Jaya">
                        </div>
                        <div>
                            <label class="block text-hijau-tua font-medium mb-2">Email BUMDes</label>
                            <input type="email" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="info@bumdesmajujaya.id">
                        </div>
                    </div>

                    <div>
                        <label class="block text-hijau-tua font-medium mb-2">Alamat Lengkap</label>
                        <textarea class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="3">Jl. Desa No. 123, Kecamatan Contoh, Kabupaten Demo</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-hijau-tua font-medium mb-2">Telepon</label>
                            <input type="tel" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="+62 812-3456-7890">
                        </div>
                        <div>
                            <label class="block text-hijau-tua font-medium mb-2">Mata Uang</label>
                            <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                                <option>IDR - Rupiah Indonesia</option>
                                <option>USD - US Dollar</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <i class="fas fa-exclamation-triangle text-yellow-500 text-xl"></i>
                        <div class="text-yellow-700 text-sm">
                            <strong>Perhatian:</strong> Perubahan pengaturan akan mempengaruhi seluruh sistem.
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="bg-hijau-utama text-white px-8 py-3 rounded-lg font-semibold hover:bg-hijau-tua transition-all">
                            Simpan Perubahan
                        </button>
                        <button type="reset" class="border border-gray-300 text-gray-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-all">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.settings-tab');
    const contents = document.querySelectorAll('.settings-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Update active tab
            tabs.forEach(t => {
                t.classList.remove('text-hijau-utama', 'bg-hijau-pastel');
                t.classList.add('text-gray-600', 'hover:text-hijau-utama', 'hover:bg-gray-50');
            });
            this.classList.add('text-hijau-utama', 'bg-hijau-pastel');
            this.classList.remove('text-gray-600', 'hover:text-hijau-utama', 'hover:bg-gray-50');
            
            // Show active content
            contents.forEach(content => {
                content.style.display = 'none';
            });
            document.getElementById(tabId + '-tab').style.display = 'block';
        });
    });
});
</script>