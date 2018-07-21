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
        // word area
        LanguageLine::create(['group' => 'word', 'key' => 'english', 'text' => ['en' => 'ENGLISH', 'tr' => 'İNGİLİZCE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'turkish', 'text' => ['en' => 'TURKISH', 'tr' => 'TÜRKÇE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'dashboard', 'text' => ['en' => 'DASHBOARD', 'tr' => 'GÖSTERGE PANELİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'task', 'text' => ['en' => 'TASKS', 'tr' => 'GÖREVLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'sales', 'text' => ['en' => 'SALES', 'tr' => 'SATIŞLAR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'purchases', 'text' => ['en' => 'PURCHASES', 'tr' => 'SATIN ALMALAR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'finance', 'text' => ['en' => 'FINANCE', 'tr' => 'FİNANS']]);
        LanguageLine::create(['group' => 'word', 'key' => 'stock', 'text' => ['en' => 'STOCK', 'tr' => 'STOK']]);
        LanguageLine::create(['group' => 'word', 'key' => 'ecommerce', 'text' => ['en' => 'E-COMMERCE', 'tr' => 'E-TİCARET']]);
        LanguageLine::create(['group' => 'word', 'key' => 'applications', 'text' => ['en' => 'APPLICATIONS', 'tr' => 'UYGULAMALAR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'users', 'text' => ['en' => 'USERS', 'tr' => 'KULLANICILAR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'logout', 'text' => ['en' => 'LOGOUT', 'tr' => 'ÇIKIŞ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'no', 'text' => ['en' =>'NO','tr'=>'HAYIR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'yes', 'text' => ['en' =>'YES','tr'=>'EVET']]);
        LanguageLine::create(['group' => 'word', 'key' => 'okay', 'text' => ['en' =>'OKAY','tr'=>'TAMAM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'board', 'text' => ['en' =>'BOARD','tr'=>'PANO']]);
        LanguageLine::create(['group' => 'word', 'key' => 'calendar', 'text' => ['en' =>'CALENDAR','tr'=>'TAKVİM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'offers', 'text' => ['en' =>'OFFERS','tr'=>'TEKLİFLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'orders', 'text' => ['en' =>'ORDERS','tr'=>'SİPARİŞLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'customer', 'text' => ['en' =>'CUSTOMER','tr'=>'MÜŞTERİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'customers', 'text' => ['en' =>'CUSTOMERS','tr'=>'MÜŞTERİLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'supplier', 'text' => ['en' =>'SUPPLIER','tr'=>'TEDARİKÇİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'suppliers', 'text' => ['en' =>'SUPPLIERS','tr'=>'TEDARİKÇİLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'expenses', 'text' => ['en' =>'EXPENSES','tr'=>'GİDERLERLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'account', 'text' => ['en' =>'ACCOUNT','tr'=>'HESAP']]);
        LanguageLine::create(['group' => 'word', 'key' => 'product', 'text' => ['en' =>'PRODUCT','tr'=>'ÜRÜN']]);
        LanguageLine::create(['group' => 'word', 'key' => 'products', 'text' => ['en' =>'PRODUCTS','tr'=>'ÜRÜNLER']]);
        LanguageLine::create(['group' => 'word', 'key' => 'date', 'text' => ['en' =>'DATE','tr'=>'TARİH']]);
        LanguageLine::create(['group' => 'word', 'key' => 'total', 'text' => ['en' =>'TOTAL','tr'=>'TOPLAM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'status', 'text' => ['en' =>'STATUS','tr'=>'DURUM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'description', 'text' => ['en' =>'DESCRIPTION','tr'=>'AÇIKLAMA']]);
        LanguageLine::create(['group' => 'word', 'key' => 'currency', 'text' => ['en' => 'CURRENCY', 'tr' => 'DÖVİZ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'service', 'text' => ['en' => 'SERVICE', 'tr' => 'HİZMET']]);
        LanguageLine::create(['group' => 'word', 'key' => 'quantity', 'text' => ['en' => 'QUANTITY', 'tr' => 'MİKTAR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'unit', 'text' => ['en' => 'UNIT', 'tr' => 'BİRİM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'vat', 'text' => ['en' => 'VAT', 'tr' => 'KDV']]);
        LanguageLine::create(['group' => 'word', 'key' => 'save', 'text' => ['en' => 'SAVE', 'tr' => 'KAYDET']]);
        LanguageLine::create(['group' => 'word', 'key' => 'email', 'text' => ['en' => 'E-MAIL', 'tr' => 'E-POSTA']]);
        LanguageLine::create(['group' => 'word', 'key' => 'phone', 'text' => ['en' => 'PHONE', 'tr' => 'TELEFON']]);
        LanguageLine::create(['group' => 'word', 'key' => 'fax', 'text' => ['en' => 'FAX', 'tr' => 'FAKS']]);
        LanguageLine::create(['group' => 'word', 'key' => 'province', 'text' => ['en' => 'PROVINCE', 'tr' => 'İL']]);
        LanguageLine::create(['group' => 'word', 'key' => 'district', 'text' => ['en' => 'DISTRICT', 'tr' => 'İLÇE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'contact', 'text' => ['en' => 'CONTACT', 'tr' => 'İLETİŞİM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'back', 'text' => ['en' => 'BACK', 'tr' => 'GERİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'next', 'text' => ['en' => 'NEXT', 'tr' => 'İLERİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'note', 'text' => ['en' => 'NOTE', 'tr' => 'NOT']]);
        LanguageLine::create(['group' => 'word', 'key' => 'deadline', 'text' => ['en' => 'DEADLINE', 'tr' => 'SON ÖDEME TARİHİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'discount', 'text' => ['en' => 'DISCOUNT', 'tr' => 'İNDİRİM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'action', 'text' => ['en' => 'ACTION', 'tr' => 'AKSİYON']]);
        LanguageLine::create(['group' => 'word', 'key' => 'name', 'text' => ['en' => 'NAME', 'tr' => 'ADI']]);
        LanguageLine::create(['group' => 'word', 'key' => 'amount', 'text' => ['en' => 'AMOUNT', 'tr' => 'TUTAR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'close', 'text' => ['en' => 'CLOSE', 'tr' => 'KAPAT']]);
        LanguageLine::create(['group' => 'word', 'key' => 'iban', 'text' => ['en' => 'IBAN', 'tr' => 'IBAN']]);
        LanguageLine::create(['group' => 'word', 'key' => 'organizer', 'text' => ['en' => 'ORGANIZER', 'tr' => 'ORGANİZATÖR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'location', 'text' => ['en' => 'LOCATION', 'tr' => 'LOKASYON']]);
        LanguageLine::create(['group' => 'word', 'key' => 'sum', 'text' => ['en' => 'SUM', 'tr' => 'MEBLAĞ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'code', 'text' => ['en' => 'CODE', 'tr' => 'KOD']]);
        LanguageLine::create(['group' => 'word', 'key' => 'barcode', 'text' => ['en' => 'BARCODE', 'tr' => 'BARKOD']]);
        LanguageLine::create(['group' => 'word', 'key' => 'category', 'text' => ['en' => 'CATEGORY', 'tr' => 'KATEGORİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'tax', 'text' => ['en' => 'TAX', 'tr' => 'VERGİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'all', 'text' => ['en' => 'ALL', 'tr' => 'TÜM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'new', 'text' => ['en' => 'NEW', 'tr' => 'YENİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'approved', 'text' => ['en' => 'APPROVED', 'tr' => 'ONAYLI']]);
        LanguageLine::create(['group' => 'word', 'key' => 'rejected', 'text' => ['en' => 'REJECTED', 'tr' => 'REDDEDİLDİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'shipped', 'text' => ['en' => 'SHIPPED', 'tr' => 'SEVK EDİLDİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'delivered', 'text' => ['en' => 'DELIVERED', 'tr' => 'TESLİM EDİLDİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'completed', 'text' => ['en' => 'COMPLETED', 'tr' => 'TAMAMLANDI']]);
        LanguageLine::create(['group' => 'word', 'key' => 'claimed', 'text' => ['en' => 'CLAIMED', 'tr' => 'TALEP EDİLDİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'search', 'text' => ['en' => 'SEARCH', 'tr' => 'ARAMA']]);
        LanguageLine::create(['group' => 'word', 'key' => 'api', 'text' => ['en' => 'API', 'tr' => 'API']]);
        LanguageLine::create(['group' => 'word', 'key' => 'filter', 'text' => ['en' => 'FILTER', 'tr' => 'FILTRELE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'company', 'text' => ['en' => 'COMPANY', 'tr' => 'ŞİRKET']]);
        LanguageLine::create(['group' => 'word', 'key' => 'balance', 'text' => ['en' => 'BALANCE', 'tr' => 'BAKİYE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'edit', 'text' => ['en' => 'EDIT', 'tr' => 'DÜZENLE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'editor', 'text' => ['en' => 'EDITOR', 'tr' => 'DÜZENLEYEN']]);
        LanguageLine::create(['group' => 'word', 'key' => 'editing', 'text' => ['en' => 'EDITING', 'tr' => 'DÜZENLEME']]);
        LanguageLine::create(['group' => 'word', 'key' => 'delete', 'text' => ['en' => 'DELETE', 'tr' => 'SİL']]);
        LanguageLine::create(['group' => 'word', 'key' => 'share', 'text' => ['en' => 'SHARE', 'tr' => 'PAYLAŞ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'type', 'text' => ['en' => 'TYPE', 'tr' => 'TÜR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'date', 'text' => ['en' => 'DATE', 'tr' => 'TARİH']]);
        LanguageLine::create(['group' => 'word', 'key' => 'remaining', 'text' => ['en' => 'REMAINING', 'tr' => 'KALAN']]);
        LanguageLine::create(['group' => 'word', 'key' => 'transfer', 'text' => ['en' => 'TRANSFER', 'tr' => 'TRANSFER YAP']]);
        LanguageLine::create(['group' => 'word', 'key' => 'charge', 'text' => ['en' => 'CHARGE', 'tr' => 'PARA ÇEK']]);
        LanguageLine::create(['group' => 'word', 'key' => 'print', 'text' => ['en' => 'PRINT', 'tr' => 'YAZDIR']]);
        LanguageLine::create(['group' => 'word', 'key' => 'dispatch', 'text' => ['en' => 'DISPATCH', 'tr' => 'SEVK']]);
        LanguageLine::create(['group' => 'word', 'key' => 'serial', 'text' => ['en' => 'SERIAL', 'tr' => 'SERİ']]);
        LanguageLine::create(['group' => 'word', 'key' => 'hour', 'text' => ['en' => 'HOUR', 'tr' => 'SAAT']]);


        // sentence area
        LanguageLine::create(['group' => 'sentence', 'key' => 'logout_info', 'text' => [
            'en' =>
                'You can improve your security further after logging out by closing this opened browser',
            'tr' =>
                'Bu açılmış tarayıcıyı kapatarak oturumu kapattıktan sonra güvenliğinizi daha da artırabilirsiniz.']
        ]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'currency_type_information', 'text' => [
            'en' =>
                'If you are going to get a payment through fixed exchange rate, you must choose Turkish Lira as the currency type.',
            'tr' =>
                'Eğer sabit kur üzerinden ödeme alacaksanız döviz cinsi olarak Türk Lirası seçmelisiniz.']
        ]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'there_is_no_offer_movement', 'text' => [
            'en' =>
                'THERE IS NO OFFER MOVEMENT',
            'tr' =>
                'TEKLİF HAREKETİ BULUNMAMAKTADIR']
        ]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'waybills_of_all_products', 'text' => [
            'en' =>
                'PRESENTATIONS OF ALL THE PRODUCTS IS PRESENTED. SEE THE LIST OF PRINCIPLES FOR RETRIEVING',
            'tr' =>
                ' TÜM ÜRÜNLERİN İRSALİYELERİ YAZDIRILMIŞTIR. YENİDEN YAZDIRMAK İÇİN İRSALİYE LİSTESİNE BAKIN']
        ]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'recent_project', 'text' => ['en' => 'RECENT PROJECT', 'tr' => 'SON PROJELER']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'company_profile', 'text' => ['en' => 'COMPANY PROFILE', 'tr' => 'ŞİRKET PROFİLİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'user_profile', 'text' => ['en' => 'USER PROFILE', 'tr' => 'KULLANICI PROFİLİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'general_settings', 'text' => ['en' => 'GENERAL SETTINGS', 'tr' => 'GENEL AYARLAR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'application_settings', 'text' => ['en' => 'APPLICATIN SETTINGS', 'tr' => 'UYGULAMA AYARLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'api_info', 'text' => ['en' => 'API INFO', 'tr' => 'API BİLGİLERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'sales_reports', 'text' => ['en' => 'SALES REPORTS', 'tr' => 'SATIŞ RAPORLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'purchase_reports', 'text' => ['en' => 'PURCHASE REPORTS', 'tr' => 'SATIN ALMA RAPORLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'payment_reports', 'text' => ['en' => 'PAYMENT REPORTS', 'tr' => 'ÖDEME RAPORLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'expenses_reports', 'text' => ['en' => 'EXPENSES REPORT', 'tr' => 'GİDER RAPORLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'vat_reports', 'text' => ['en' => 'VAT REPORTS', 'tr' => 'KDV RAPORLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'collect_reports', 'text' => ['en' => 'COLLECT REPORTS', 'tr' => 'TAHSİLAT RAPORLARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'services_and_products', 'text' => ['en' => 'SERVICES AND PRODUCTS', 'tr' => 'HİZMETLER VE ÜRÜNLER']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'stock_movements', 'text' => ['en' => 'STOCK MOVEMENTS', 'tr' => 'STOK HAREKETLERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'products_in_stock', 'text' => ['en' => 'PRODUCTS IN STOCK', 'tr' => 'STOKTAKİ ÜRÜNLER']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'new_offer', 'text' => ['en' => 'NEW OFFER', 'tr' => 'YENİ TEKLİF']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'new_order', 'text' => ['en' => 'NEW ORDER', 'tr' => 'YENİ SİPARİŞ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'offer_date', 'text' => ['en' => 'OFFER DATE', 'tr' => 'TEKLİF TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'validity_date', 'text' => ['en' => 'VALIDITY DATE', 'tr' => 'GEÇERLİLİK TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'unit_price', 'text' => ['en' => 'UNIT PRICE', 'tr' => 'BİRİM FİYATI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'choose_product', 'text' => ['en' => 'CHOOSE PRODUCT', 'tr' => 'ÜRÜN SEÇ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'no_matching_options', 'text' => ['en' => 'SORRY, NO MATCHING OPTIONS', 'tr' => 'ÜZGÜNÜZ, EŞLEŞME BULUNAMADI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_new_row', 'text' => ['en' => 'ADD NEW ROW', 'tr' => 'YENİ SATIR EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'detailed_description', 'text' => ['en' => 'DETAILED DESCRIPTION', 'tr' => 'DETAYLI AÇIKLAMA']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'sub_total', 'text' => ['en' => 'SUB TOTAL', 'tr' => 'ARA TOPLAM']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'total_vat', 'text' => ['en' => 'TOTAL VAT', 'tr' => 'TOPLAM KDV']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'general_total', 'text' => ['en' => 'GENERAL TOTAL', 'tr' => 'GENEL TOPLAM']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'choose_company', 'text' => ['en' => 'CHOOSE COMPANY', 'tr' => 'ŞİRKET SEÇ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'click_for_a_new_company', 'text' => ['en' => 'CLICK FOR A NEW COMPANY', 'tr' => 'YENİ BİR ŞİRKET İÇİN TIKLAYIN']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_tag', 'text' => ['en' => 'ADD TAG', 'tr' => 'ETİKET EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'new_customer', 'text' => ['en' => 'NEW CUSTOMER', 'tr' => 'YENİ MÜŞTERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'customer_name', 'text' => ['en' => 'CUSTOMER NAME', 'tr' => 'MÜŞTERİ ADI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'customer_informations', 'text' => ['en' => 'CUSTOMER INFORMATIONS', 'tr' => 'MÜŞTERİ BİLGİLERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'short_name', 'text' => ['en' => 'SHORT NAME', 'tr' => 'KISA AD']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'current_code', 'text' => ['en' => 'CURRENT CODE', 'tr' => 'CARİ KODU']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'abroad_address', 'text' => ['en' => 'ABROAD ADDRESS', 'tr' => 'YURT DIŞI ADRESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'ebilling_taxpayer', 'text' => ['en' => 'E-BILLING TAXPAYER', 'tr' => 'E-FATURA VERGİ MÜKELLİFİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'billing_address', 'text' => ['en' => 'BILLING ADDRESS', 'tr' => 'FATURA ADRESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'billing_informations', 'text' => ['en' => 'BILLING INFORMATIONS', 'tr' => 'FATURA BİLGİLERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'shipping_address', 'text' => ['en' => 'SHIPPING ADDRESS', 'tr' => 'TESLİMAT ADRESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'tax_office', 'text' => ['en' => 'TAX OFFICE', 'tr' => 'VERGİ DAİRESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'iban_number', 'text' => ['en' => 'IBAN NUMBER', 'tr' => 'IBAN NUMARASI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'vkn_tckn', 'text' => ['en' => 'VKN_TCKN', 'tr' => 'VKN_TCKN']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'order_date', 'text' => ['en' => 'ORDER DATE', 'tr' => 'SİPARİŞ TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'payable_date', 'text' => ['en' => 'PAYABLE DATE', 'tr' => 'BORÇ TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_expense', 'text' => ['en' => 'ADD EXPENSE', 'tr' => 'GİDER EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'expense_type', 'text' => ['en' => 'EXPENSE TYPE', 'tr' => 'GİDER TÜRÜ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'paid_account', 'text' => ['en' => 'PAID ACCOUNT', 'tr' => 'ÖDENECEK HESAP']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'select_account', 'text' => ['en' => 'SELECT ACCOUNT', 'tr' => 'HESAP SEÇ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'cash_account', 'text' => ['en' => 'CASH ACCOUNT', 'tr' => 'KASA HESABI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'account_name', 'text' => ['en' => 'ACCOUNT NAME', 'tr' => 'HESAB ADI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_safe', 'text' => ['en' => 'ADD SAFE', 'tr' => 'KASA EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_bank', 'text' => ['en' => 'ADD BANK', 'tr' => 'BANKA EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_credit_account', 'text' => ['en' => 'ADD CREDIT ACCOUNT', 'tr' => 'KREDİ HESABI EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'currency_type', 'text' => ['en' => 'CURRENCY TYPE', 'tr' => 'DÖVİZ TÜRÜ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'opening_balance', 'text' => ['en' => 'OPENING BALANCE', 'tr' => 'AÇILIŞ BAKİYESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'opening_balance_date', 'text' => ['en' => 'OPENING BALANCE DATE', 'tr' => 'AÇILIŞ BAKİYESİ TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'bank_name', 'text' => ['en' => 'BANK NAME', 'tr' => 'BANKA ADI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'bank_branch', 'text' => ['en' => 'BANK BRANCH', 'tr' => 'BANKA ŞUBESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'account_number', 'text' => ['en' => 'ACCOUNT NUMBER', 'tr' => 'HESAP NUMARASI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'cheque_available', 'text' => ['en' => 'CHEQUE AVAILABLE', 'tr' => 'ÇEK KULLANILABİLİR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'expiry_date', 'text' => ['en' => 'EXPIRY DATE', 'tr' => 'SON KULLANMA TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'stock_quantity', 'text' => ['en' => 'STOCK QUANTITY', 'tr' => 'STOCK MİKTARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'purchase_price', 'text' => ['en' => 'PURCHASE PRICE', 'tr' => 'ALIŞ FİYATI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'sales_price', 'text' => ['en' => 'SALES PRICE', 'tr' => 'SATIŞ FİYATI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'new_product', 'text' => ['en' => 'NEW PRODUCT', 'tr' => 'YENİ ÜRÜN']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'product_name', 'text' => ['en' => 'PRODUCT NAME', 'tr' => 'ÜRÜN ADI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'product_image', 'text' => ['en' => 'PRODUCT IMAGE', 'tr' => 'ÜRÜN RESMİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'product_detail', 'text' => ['en' => 'PRODUCT DETAIL', 'tr' => 'ÜRÜN DETAYI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'stock_follow_up', 'text' => ['en' => 'STOCK FOLLOW UP', 'tr' => 'STOK TAKİBİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'stock_type', 'text' => ['en' => 'STOCK TYPE', 'tr' => 'STOK TÜRÜ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'select_vat', 'text' => ['en' => 'SELECT VAT', 'tr' => 'KDV SEÇ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'edition_date', 'text' => ['en' => 'EDITION DATE', 'tr' => 'BASIM TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'in_stock', 'text' => ['en' => 'IN STOCK', 'tr' => 'STOKTA VAR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'out_stock', 'text' => ['en' => 'OUT STOCK', 'tr' => 'STOKTA YOK']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'new_action', 'text' => ['en' => 'NEW ACTION', 'tr' => 'YENİ AKSİYON']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'edit_date', 'text' => ['en' => 'EDIT DATE', 'tr' => 'DÜZENLENME TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'receipt_type', 'text' => ['en' => 'RECEIPT TYPE', 'tr' => 'FİŞ TÜRÜ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'choose_receipt_type', 'text' => ['en' => 'CHOOSE RECEIPT TYPE', 'tr' => 'FİŞ TÜRÜ SEÇ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'production_input_receipt', 'text' => ['en' => 'PRODUCTION INPUT RECEIPT', 'tr' => 'ÜRETİMDEN GİRİŞ FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'counting_excess_receipt', 'text' => ['en' => 'COUNTING EXCESS RECEIPT', 'tr' => 'SAYIM FAZLASI FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'entry_waybill_receipt', 'text' => ['en' => 'ENTRY WAYBILL RECEIPT', 'tr' => 'GİRİŞ İRSALİYE FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'cikis_irsaliyesi', 'text' => ['en' => 'cikis_irsaliyesi [en]', 'tr' => 'ÇIKIŞ İRSALİYESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'perakende_satis_irsaliyesi', 'text' => ['en' => 'perakende_satis_irsaliyesi [en]', 'tr' => 'PERAKENDE SATIŞ İRSALİYESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'alim_iade_irsaliyesi', 'text' => ['en' => 'alim_iade_irsaliyesi [en]', 'tr' => 'ALIM İADE İRSALİYESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'sayim_eksigi_fisi', 'text' => ['en' => 'sayim_eksigi_fisi [en]', 'tr' => 'SAYIM EKSİĞİ FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'fire_fisi', 'text' => ['en' => 'fire_fisi [en]', 'tr' => 'FİRE FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'sarf_fisi', 'text' => ['en' => 'sarf_fisi [en]', 'tr' => 'SARF FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'numune_cikis_fisi', 'text' => ['en' => 'numune_cikis_fisi [en]', 'tr' => 'NUMUNE ÇIKIŞ FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'uretime_cikis_fisi', 'text' => ['en' => 'uretime_cikis_fisi [en]', 'tr' => 'ÜRETİME ÇIKIŞ FİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_product', 'text' => ['en' => 'ADD PRODUCT', 'tr' => 'ÜRÜN EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'edit_profile', 'text' => ['en' => 'EDIT PROFILE', 'tr' => 'PROFİLİ DÜZENLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'tax_office_id', 'text' => ['en' => 'TAX OFFICE ID', 'tr' => 'VKN TCKN']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_collection', 'text' => ['en' => 'ADD COLLECTION', 'tr' => 'TAHSİLAT EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_payment', 'text' => ['en' => 'ADD PAYMENT', 'tr' => 'ÖDEME EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'print_offer', 'text' => ['en' => 'PRINT OFFER', 'tr' => 'TEKLİFİ YAZDIR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'print_order', 'text' => ['en' => 'PRINT ORDER', 'tr' => 'SİPARİŞİ YAZDIR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'print_invoice', 'text' => ['en' => 'PRINT INVOICE', 'tr' => 'FATURAYI YAZDIR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'download_offer', 'text' => ['en' => 'DOWNLOAD OFFER', 'tr' => 'TEKLİFİ İNDİR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'download_order', 'text' => ['en' => 'DOWNLOAD ORDER', 'tr' => 'SİPARİŞİ İNDİR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'download_pdf_account_summary', 'text' => ['en' => 'DOWNLOAD PDF ACCOUNT SUMMARY', 'tr' => 'EKSTRE PDF OLARAK İNDİR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'delete_row', 'text' => ['en' => 'DELETE ROW', 'tr' => 'SATIRI SİL']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'total_order', 'text' => ['en' => 'TOTAL ORDER', 'tr' => 'TOPLAM SİPARİŞ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'shop_code', 'text' => ['en' => 'SHOP CODE', 'tr' => 'MAĞAZA KODU']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'stock_number', 'text' => ['en' => 'STOCK NUMBER', 'tr' => 'STOK NUMARASI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'check_is_available', 'text' => ['en' => 'CHECK IS AVAILABLE', 'tr' => 'ÇEK KULLANILABİLİR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'account_processed', 'text' => ['en' => 'ACCOUNT PROCCESSED', 'tr' => 'İŞLENDİĞİ HESAP']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'collected_sum', 'text' => ['en' => 'COLLECTED SUM', 'tr' => 'TAHSİL EDİLEN MEBLAĞ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'invoice_processed', 'text' => ['en' => 'INVOICE PROCESSED', 'tr' => 'İŞLENDİĞİ FATURA']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'currency_processed', 'text' => ['en' => 'CURRENCY PROCESSED', 'tr' => 'İŞLENEN DÖVİZ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'total_invoice', 'text' => ['en' => 'TOTAL INVOINCE', 'tr' => 'TOPLAM FATURA']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'all_informations', 'text' => ['en' => 'ALL INFORMATIONS', 'tr' => 'TÜM BİLGİLER']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'bank_and_branches', 'text' => ['en' => 'BANK AND BRANCHES', 'tr' => 'BANKA VE ŞUBELERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'transfer_to_other_account', 'text' => ['en' => 'TRANSFER TO OTHER ACCOUNT', 'tr' => 'DİĞER HESABA TRANSFER YAP']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_money_inpur', 'text' => ['en' => 'ADD MONEY INPUT', 'tr' => 'PARA GİRİŞİ EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_money_out', 'text' => ['en' => 'ADD MONEY OUT', 'tr' => 'PARA ÇIKIŞI EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'other_account_transactions', 'text' => ['en' => 'OTHER ACCOUNT TRANSACTIONS', 'tr' => 'DİĞER HESAB İŞLEMLERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'transfer_to_account', 'text' => ['en' => 'TRANSFER TO ACCOUNT', 'tr' => 'HESABA TRANSFER YAP']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'money_input', 'text' => ['en' => 'MONEY INPUT', 'tr' => 'PARA GİRİŞİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'money_out', 'text' => ['en' => 'MONEY OUT', 'tr' => 'PARA ÇIKIŞI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'received_date', 'text' => ['en' => 'RECEIVED DATE', 'tr' => 'ALINDIĞI TARİH']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'given_date', 'text' => ['en' => 'GİVEN DATE', 'tr' => 'VERİLDİĞİ TARİH']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'transacted_sum', 'text' => ['en' => 'TRANSACTED SUM', 'tr' => 'İŞLENEN MEBLAĞ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'delete_cheque', 'text' => ['en' => 'DELETE CHEQUE', 'tr' => 'ÇEKİ SİL']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'total_cheque', 'text' => ['en' => 'TOTAL CHEQUE', 'tr' => 'TOPLAM ÇEK']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'create_copy', 'text' => ['en' => 'CREATE COPY', 'tr' => 'KOPYA OLUŞTUR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'convert_to_order', 'text' => ['en' => 'CONVERT TO ORDER', 'tr' => 'SİPARİŞE DÖNÜŞTÜR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'order_amount', 'text' => ['en' => 'ORDER AMOUNT', 'tr' => 'SİPARİŞ TUTARI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'remaining_amount', 'text' => ['en' => 'REMAINING AMOUNT', 'tr' => 'KALAN TUTAR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'account_balanca', 'text' => ['en' => 'ACCOUNT BALANCE', 'tr' => 'HESAP BAKİYESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'proforma_invoice', 'text' => ['en' => 'PROFORMA INVOICE', 'tr' => 'PROFORM FATURA']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'excluding_vat', 'text' => ['en' => 'EXCLUDING VAT', 'tr' => 'KDV HARİÇ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'general_amount', 'text' => ['en' => 'GENERAL AMOUNT', 'tr' => 'GENEL TUTAR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'orders_created_from_offer', 'text' => ['en' => 'ORDERS CREATED FROM OFFER', 'tr' => 'TEKLİFTEN OLUŞTURULAN SİPARİŞLER']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'cancel_search', 'text' => ['en' => 'CANCEL SEARCH', 'tr' => 'ARAMAYI İPTAL ET']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'print_waybill', 'text' => ['en' => 'PRINT WAYBILL', 'tr' => 'İRSALİYEYİ YAZDIR']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'waybill_number', 'text' => ['en' => 'WAYBILL NUMBER', 'tr' => 'İRSALİYE NUMARASI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'product_selection', 'text' => ['en' => 'PRODUCT SELECTION', 'tr' => 'ÜRÜN SEÇİMİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'waybill_informations', 'text' => ['en' => 'WAYBILL INFORMATIONS', 'tr' => 'İRSALİYE BİLGİLERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'dispatch_date', 'text' => ['en' => 'DISPATCH DATE', 'tr' => 'SEVK TARİHİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'waybill_note', 'text' => ['en' => 'WAYBILL NOTE', 'tr' => 'İRSALİYE NOTU']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'invoice_number', 'text' => ['en' => 'INVOICE NUMBER ', 'tr' => 'FATURA NUMARASI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'invoice_note', 'text' => ['en' => 'INVOICE NUMBER ', 'tr' => 'FATURA NUMARASI']]);



    }
}
