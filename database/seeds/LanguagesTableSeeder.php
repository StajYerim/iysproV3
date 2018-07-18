<?php

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_lines')->delete();
        LanguageLine::create(['group' => 'general', 'key' => 'customer', 'text' => ['en' => 'Customer', 'tr' => 'Müşteri']]);
        LanguageLine::create(['group' => 'general', 'key' => 'supplier', 'text' => ['en' => 'Supplier', 'tr' => 'Tedarikçi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'service', 'text' => ['en' => 'Service', 'tr' => 'Hizmet']]);
        LanguageLine::create(['group' => 'general', 'key' => 'account', 'text' => ['en' => 'Account', 'tr' => 'Hesap']]);
        LanguageLine::create(['group' => 'general', 'key' => 'product', 'text' => ['en' => 'Product', 'tr' => 'Ürün']]);
        LanguageLine::create(['group' => 'general', 'key' => 'barcode', 'text' => ['en' => 'Barcode', 'tr' => 'Barkod']]);
        LanguageLine::create(['group' => 'general', 'key' => 'code', 'text' => ['en' => 'Code', 'tr' => 'Kod']]);
        LanguageLine::create(['group' => 'general', 'key' => 'unit', 'text' => ['en' => 'Unit', 'tr' => 'Birim']]);
        LanguageLine::create(['group' => 'general', 'key' => 'new', 'text' => ['en' => 'New', 'tr' => 'Yeni']]);
        LanguageLine::create(['group' => 'general', 'key' => 'old', 'text' => ['en' => 'Old', 'tr' => 'Eski']]);
        LanguageLine::create(['group' => 'general', 'key' => 'offer', 'text' => ['en' => 'Offer', 'tr' => 'Sipariş']]);
        LanguageLine::create(['group' => 'general', 'key' => 'total', 'text' => ['en' => 'Total', 'tr' => 'Toplam']]);
        LanguageLine::create(['group' => 'general', 'key' => 'status', 'text' => ['en' => 'Status', 'tr' => 'Durum']]);
        LanguageLine::create(['group' => 'general', 'key' => 'company', 'text' => ['en' => 'Company', 'tr' => 'Şirket']]);
        LanguageLine::create(['group' => 'general', 'key' => 'click', 'text' => ['en' => 'Click', 'tr' => 'Tıkla']]);
        LanguageLine::create(['group' => 'general', 'key' => 'for', 'text' => ['en' => 'For', 'tr' => 'İçin']]);
        LanguageLine::create(['group' => 'general', 'key' => 'validity', 'text' => ['en' => 'Validity', 'tr' => 'Geçerlilik']]);
        LanguageLine::create(['group' => 'general', 'key' => 'detailed', 'text' => ['en' => 'Detailed', 'tr' => 'Detalı']]);
        LanguageLine::create(['group' => 'general', 'key' => 'price', 'text' => ['en' => 'Price', 'tr' => 'Fiyat']]);
        LanguageLine::create(['group' => 'general', 'key' => 'amount', 'text' => ['en' => 'Amount', 'tr' => 'Tutar']]);
        LanguageLine::create(['group' => 'general', 'key' => 'general', 'text' => ['en' => 'General', 'tr' => 'Genel']]);
        LanguageLine::create(['group' => 'general', 'key' => 'print', 'text' => ['en' => 'Print', 'tr' => 'Yazdır']]);
        LanguageLine::create(['group' => 'general', 'key' => 'printer', 'text' => ['en' => 'Printer', 'tr' => 'Yazıcı']]);
        LanguageLine::create(['group' => 'general', 'key' => 'subtotal', 'text' => ['en' => 'Subtotal', 'tr' => 'Ara Toplam']]);
        LanguageLine::create(['group' => 'general', 'key' => 'change', 'text' => ['en' => 'Change', 'tr' => 'Değiştir']]);
        LanguageLine::create(['group' => 'general', 'key' => 'effective', 'text' => ['en' => 'Effective', 'tr' => 'Efektif']]);
        LanguageLine::create(['group' => 'general', 'key' => 'order', 'text' => ['en' => 'Order', 'tr' => 'Sipariş']]);
        LanguageLine::create(['group' => 'general', 'key' => 'phone', 'text' => ['en' => 'Phone', 'tr' => 'Telefon']]);
        
        LanguageLine::create(['group' => 'general', 'key' => 'fax', 'text' => ['en' =>'fax','tr'=>'Faks']]);
        LanguageLine::create(['group' => 'general', 'key' => 'number', 'text' => ['en' =>'Number','tr'=>'Numara']]);
        LanguageLine::create(['group' => 'general', 'key' => 'sales', 'text' => ['en' =>'Sales','tr'=>'Satış']]);
        LanguageLine::create(['group' => 'general', 'key' => 'purchase', 'text' => ['en' =>'Purchase','tr'=>'Alış']]);
        LanguageLine::create(['group' => 'general', 'key' => 'remaining', 'text' => ['en' =>'Remaining','tr'=>'Kalan']]);
        LanguageLine::create(['group' => 'general', 'key' => 'email', 'text' => ['en' =>'E-mail','tr'=>'E-posta']]);
        LanguageLine::create(['group' => 'general', 'key' => 'address', 'text' => ['en' =>'Address','tr'=>'Adres']]);
        LanguageLine::create(['group' => 'general', 'key' => 'abroad', 'text' => ['en' =>'Abroad','tr'=>'Yurt Dışı']]);
        LanguageLine::create(['group' => 'general', 'key' => 'eBilling', 'text' => ['en' =>'E-Billing','tr'=>'E-Faturalama']]);
        LanguageLine::create(['group' => 'general', 'key' => 'taxPayer', 'text' => ['en' =>'Taxpayer','tr'=>'Vergi Mükellefi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'tax', 'text' => ['en' =>'Tax','tr'=>'Vergi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'city', 'text' => ['en' =>'City','tr'=>'Şehir']]);
        LanguageLine::create(['group' => 'general', 'key' => 'town', 'text' => ['en' =>'Town','tr'=>'Kasaba']]);
        LanguageLine::create(['group' => 'general', 'key' => 'contact', 'text' => ['en' =>'Contact','tr'=>'İletişim']]);
        LanguageLine::create(['group' => 'general', 'key' => 'current', 'text' => ['en' =>'Current','tr'=>'Cari']]);
        LanguageLine::create(['group' => 'general', 'key' => 'name', 'text' => ['en' =>'Name','tr'=>'Ad']]);
        LanguageLine::create(['group' => 'general', 'key' => 'surname', 'text' => ['en' =>'Surname','tr'=>'Soyad']]);
        LanguageLine::create(['group' => 'general', 'key' => 'short', 'text' => ['en' =>'Short','tr'=>'Kısa']]);
        LanguageLine::create(['group' => 'general', 'key' => 'save', 'text' => ['en' =>'Save','tr'=>'Kaydet']]);
        LanguageLine::create(['group' => 'general', 'key' => 'back', 'text' => ['en' =>'Back','tr'=>'Geri']]);
        LanguageLine::create(['group' => 'general', 'key' => 'description', 'text' => ['en' =>'Description','tr'=>'Açıklama']]);
        LanguageLine::create(['group' => 'general', 'key' => 'edit', 'text' => ['en' =>'Edit','tr'=>'Düzenle']]);
        LanguageLine::create(['group' => 'general', 'key' => 'date', 'text' => ['en' =>'Date','tr'=>'Tarih']]);
        LanguageLine::create(['group' => 'general', 'key' => 'share', 'text' => ['en' =>'Share','tr'=>'Paylaş']]);
        LanguageLine::create(['group' => 'general', 'key' => 'quantity', 'text' => ['en' =>'Quantity','tr'=>'Miktar']]);
        LanguageLine::create(['group' => 'general', 'key' => 'collection', 'text' => ['en' =>'Collection','tr'=>'Tahsilat']]);
        LanguageLine::create(['group' => 'general', 'key' => 'download', 'text' => ['en' =>'Download','tr'=>'İndir']]);
        LanguageLine::create(['group' => 'general', 'key' => 'title', 'text' => ['en' =>'Title','tr'=>'Ünvan']]);
        LanguageLine::create(['group' => 'general', 'key' => 'operation', 'text' => ['en' =>'Operation','tr'=>'İşlem']]);
        LanguageLine::create(['group' => 'general', 'key' => 'operations', 'text' => ['en' =>'Operations','tr'=>'İşlemler']]);
        LanguageLine::create(['group' => 'general', 'key' => 'open', 'text' => ['en' =>'Open','tr'=>'Açık']]);
        LanguageLine::create(['group' => 'general', 'key' => 'opening', 'text' => ['en' =>'Opening','tr'=>'Açılış']]);
        LanguageLine::create(['group' => 'general', 'key' => 'information', 'text' => ['en' =>'Information','tr'=>'Bilgi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'informations', 'text' => ['en' =>'Informations','tr'=>'Bilgiler']]);
        LanguageLine::create(['group' => 'general', 'key' => 'type', 'text' => ['en' =>'Type','tr'=>'Tür']]);
        LanguageLine::create(['group' => 'general', 'key' => 'sum', 'text' => ['en' =>'Sum','tr'=>'Meblağ']]);
        LanguageLine::create(['group' => 'general', 'key' => 'extract', 'text' => ['en' =>'Extract','tr'=>'Ekstre']]);
        LanguageLine::create(['group' => 'general', 'key' => 'search', 'text' => ['en' =>'Search','tr'=>'Arama']]);
        LanguageLine::create(['group' => 'general', 'key' => 'approved', 'text' => ['en' =>'Approved','tr'=>'Onaylı']]);
        LanguageLine::create(['group' => 'general', 'key' => 'rejected', 'text' => ['en' =>'Rejected','tr'=>'Reddedilen']]);
        LanguageLine::create(['group' => 'general', 'key' => 'delivered', 'text' => ['en' =>'Delivered','tr'=>'Teslim Edildi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'completed', 'text' => ['en' =>'Completed','tr'=>'Tamamlandı']]);
        LanguageLine::create(['group' => 'general', 'key' => 'claimed', 'text' => ['en' =>'Claimed','tr'=>'Talep Edildi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'shipped', 'text' => ['en' =>'Shipped','tr'=>'Nakliye Edildi']]);
        LanguageLine::create(['group' => 'general', 'key' => 'shipping', 'text' => ['en' =>'Shipping','tr'=>'Nakliye']]);
        LanguageLine::create(['group' => 'general', 'key' => 'add', 'text' => ['en' =>'Add','tr'=>'Ekle']]);
        LanguageLine::create(['group' => 'general', 'key' => 'category', 'text' => ['en' =>'Category','tr'=>'Kategori']]);
        LanguageLine::create(['group' => 'general', 'key' => 'detail', 'text' => ['en' =>'Detail','tr'=>'Detay']]);
        LanguageLine::create(['group' => 'general', 'key' => 'choose', 'text' => ['en' =>'Choose','tr'=>'Seç']]);
        LanguageLine::create(['group' => 'general', 'key' => 'shop', 'text' => ['en' =>'Shop','tr'=>'Mağaza']]);
        LanguageLine::create(['group' => 'general', 'key' => 'stock', 'text' => ['en' =>'Stock','tr'=>'Stok']]);
        LanguageLine::create(['group' => 'general', 'key' => 'currency', 'text' => ['en' =>'Currency','tr'=>'Döviz']]);
        LanguageLine::create(['group' => 'general', 'key' => 'check', 'text' => ['en' =>'Check','tr'=>'Çek']]);
        LanguageLine::create(['group' => 'general', 'key' => 'bank', 'text' => ['en' =>'Bank','tr'=>'Banka']]);
        LanguageLine::create(['group' => 'general', 'key' => 'branch', 'text' => ['en' =>'Branch','tr'=>'Şube']]);
        LanguageLine::create(['group' => 'general', 'key' => 'invoice', 'text' => ['en' =>'Invoice','tr'=>'Fatura']]);
        LanguageLine::create(['group' => 'general', 'key' => 'processed', 'text' => ['en' =>'Processed','tr'=>'İşlenen']]);
        LanguageLine::create(['group' => 'general', 'key' => 'all', 'text' => ['en' =>'All','tr'=>'Tüm']]);
        LanguageLine::create(['group' => 'general', 'key' => 'and', 'text' => ['en' =>'And','tr'=>'Ve']]);
        LanguageLine::create(['group' => 'general', 'key' => 'return', 'text' => ['en' =>'Return','tr'=>'Dön']]);
        LanguageLine::create(['group' => 'general', 'key' => 'location', 'text' => ['en' =>'Location','tr'=>'Location']]);
        LanguageLine::create(['group' => 'general', 'key' => 'cancel', 'text' => ['en' =>'Cancel','tr'=>'İptal Et']]);
        LanguageLine::create(['group' => 'general', 'key' => 'expense', 'text' => ['en' =>'Expense','tr'=>'Gider']]);
        LanguageLine::create(['group' => 'general', 'key' => 'expenses', 'text' => ['en' =>'Expenses','tr'=>'Giderler']]);
        LanguageLine::create(['group' => 'general', 'key' => 'action', 'text' => ['en' =>'Action','tr'=>'Aksiyon']]);
        LanguageLine::create(['group' => 'general', 'key' => 'paid', 'text' => ['en' =>'Paid','tr'=>'Ödenen']]);
        LanguageLine::create(['group' => 'general', 'key' => 'transfer', 'text' => ['en' =>'Transfer','tr'=>'Transfer Et']]);
        LanguageLine::create(['group' => 'general', 'key' => 'money', 'text' => ['en' =>'Money','tr'=>'Para']]);
        LanguageLine::create(['group' => 'general', 'key' => 'entry', 'text' => ['en' =>'Entry','tr'=>'Giriş']]);
        LanguageLine::create(['group' => 'general', 'key' => 'out', 'text' => ['en' =>'Out','tr'=>'Çıkış']]);
        LanguageLine::create(['group' => 'general', 'key' => 'convert', 'text' => ['en' =>'Convert','tr'=>'Dönüştür']]);
        LanguageLine::create(['group' => 'general', 'key' => 'payable', 'text' => ['en' =>'Payable','tr'=>'Ödenecek']]);
        LanguageLine::create(['group' => 'general', 'key' => 'payment', 'text' => ['en' =>'Payable','tr'=>'Ödeme']]);
        LanguageLine::create(['group' => 'general', 'key' => 'proforma', 'text' => ['en' =>'Proforma','tr'=>'Proforma']]);
        LanguageLine::create(['group' => 'general', 'key' => 'excluding', 'text' => ['en' =>'Excluding','tr'=>'Hariç']]);
        LanguageLine::create(['group' => 'general', 'key' => 'movement', 'text' => ['en' =>'Movement','tr'=>'Hareket']]);
        LanguageLine::create(['group' => 'general', 'key' => 'key', 'text' => ['en' =>'Key','tr'=>'Anahtar']]);
        LanguageLine::create(['group' => 'general', 'key' => 'password', 'text' => ['en' =>'Password','tr'=>'Şifre']]);
        LanguageLine::create(['group' => 'general', 'key' => 'client', 'text' => ['en' =>'Client','tr'=>'İstemci']]);
        LanguageLine::create(['group' => 'general', 'key' => 'secret', 'text' => ['en' =>'Secret','tr'=>'Sır']]);
        LanguageLine::create(['group' => 'general', 'key' => 'user', 'text' => ['en' =>'User','tr'=>'Kullanıcı']]);
        LanguageLine::create(['group' => 'general', 'key' => 'mobile', 'text' => ['en' =>'Mobile','tr'=>'Mobil']]);
        LanguageLine::create(['group' => 'general', 'key' => 'language', 'text' => ['en' =>'Language','tr'=>'Dil']]);
        LanguageLine::create(['group' => 'general', 'key' => 'access', 'text' => ['en' =>'Access','tr'=>'Erişim']]);
        LanguageLine::create(['group' => 'general', 'key' => 'submit', 'text' => ['en' =>'Submit','tr'=>'Gönder']]);
        LanguageLine::create(['group' => 'general', 'key' => 'no', 'text' => ['en' =>'No','tr'=>'Hayır']]);
        LanguageLine::create(['group' => 'general', 'key' => 'yes', 'text' => ['en' =>'Yes','tr'=>'Evet']]);
        LanguageLine::create(['group' => 'general', 'key' => 'okay', 'text' => ['en' =>'Okay','tr'=>'Tamam']]);
        LanguageLine::create(['group' => 'general', 'key' => 'view', 'text' => ['en' =>'View','tr'=>'Görünüm']]);
        LanguageLine::create(['group' => 'general', 'key' => 'full', 'text' => ['en' =>'Full','tr'=>'Tam']]);
        LanguageLine::create(['group' => 'general', 'key' => 'permission', 'text' => ['en' =>'Permission','tr'=>'İzin']]);
        LanguageLine::create(['group' => 'general', 'key' => 'permissions', 'text' => ['en' =>'Permissions','tr'=>'İzinler']]);
        LanguageLine::create(['group' => 'general', 'key' => 'module', 'text' => ['en' =>'Module','tr'=>'Modül']]);
        LanguageLine::create(['group' => 'general', 'key' => 'arrangement', 'text' => ['en' =>'Arrangement','tr'=>'Düzenleme']]);
        LanguageLine::create(['group' => 'general', 'key' => 'receipt', 'text' => ['en' =>'Receipt','tr'=>'Fiş']]);
        LanguageLine::create(['group' => 'general', 'key' => 'row', 'text' => ['en' =>'Row','tr'=>'Satır']]);
        LanguageLine::create(['group' => 'general', 'key' => 'archive', 'text' => ['en' =>'Archive','tr'=>'Arşivle']]);
        LanguageLine::create(['group' => 'general', 'key' => 'vat', 'text' => ['en' =>'VAT','tr'=>'KDV']]);
        LanguageLine::create(['group' => 'general', 'key' => 'cost', 'text' => ['en' =>'Cost','tr'=>'Maliyet']]);
        LanguageLine::create(['group' => 'general', 'key' => 'update', 'text' => ['en' =>'Update','tr'=>'Güncelle']]);
        LanguageLine::create(['group' => 'general', 'key' => 'confirmation', 'text' => ['en' =>'Confirmation','tr'=>'Doğrulama']]);
        LanguageLine::create(['group' => 'general', 'key' => 'group', 'text' => ['en' =>'Group','tr'=>'Grup']]);
        LanguageLine::create(['group' => 'general', 'key' => 'settings', 'text' => ['en' =>'Settings','tr'=>'Ayarlar']]);
        LanguageLine::create(['group' => 'general', 'key' => 'show', 'text' => ['en' =>'Show','tr'=>'Göster']]);
        LanguageLine::create(['group' => 'general', 'key' => 'widget', 'text' => ['en' =>'Widget','tr'=>'Bileşen']]);
        LanguageLine::create(['group' => 'general', 'key' => 'my', 'text' => ['en' =>'My','tr'=>'Benim']]);
        LanguageLine::create(['group' => 'general', 'key' => 'template', 'text' => ['en' =>'Template','tr'=>'Şablon']]);
        LanguageLine::create(['group' => 'general', 'key' => 'templates', 'text' => ['en' =>'Templates','tr'=>'Şablonlar']]);
        LanguageLine::create(['group' => 'general', 'key' => 'planning', 'text' => ['en' =>'Planning','tr'=>'Planlama']]);
        LanguageLine::create(['group' => 'general', 'key' => 'warehouse', 'text' => ['en' =>'Warehouse','tr'=>'Depo']]);
        LanguageLine::create(['group' => 'general', 'key' => 'tag', 'text' => ['en' =>'Tag','tr'=>'Etiket']]);
        LanguageLine::create(['group' => 'general', 'key' => 'tags', 'text' => ['en' =>'Tags','tr'=>'Etiketler']]);
        LanguageLine::create(['group' => 'general', 'key' => 'app', 'text' => ['en' =>'App','tr'=>'Uygulama']]);
        LanguageLine::create(['group' => 'general', 'key' => 'manager', 'text' => ['en' =>'Manager','tr'=>'Yönetici']]);
        

    }
}
