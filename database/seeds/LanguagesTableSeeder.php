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
        LanguageLine::create(['group' => 'word', 'key' => 'no', 'text' => ['en' =>'No','tr'=>'Hayır']]);
        LanguageLine::create(['group' => 'word', 'key' => 'yes', 'text' => ['en' =>'Yes','tr'=>'Evet']]);
        LanguageLine::create(['group' => 'word', 'key' => 'okay', 'text' => ['en' =>'Okay','tr'=>'Tamam']]);
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
        LanguageLine::create(['group' => 'word', 'key' => 'province', 'text' => ['en' => 'PROVINCE', 'tr' => 'İL']]);
        LanguageLine::create(['group' => 'word', 'key' => 'district', 'text' => ['en' => 'DISTRICT', 'tr' => 'İLÇE']]);
        LanguageLine::create(['group' => 'word', 'key' => 'contact', 'text' => ['en' => 'CONTACT', 'tr' => 'İLETİŞİM']]);
        LanguageLine::create(['group' => 'word', 'key' => 'back', 'text' => ['en' => 'BACK', 'tr' => 'GERİ']]);
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


        // sentence area
        LanguageLine::create(['group' => 'sentence', 'key' => 'logout_info', 'text' => [
            'en' =>
                'You can improve your security further after logging out by closing this opened browser',
            'tr' =>
                'Bu açılmış tarayıcıyı kapatarak oturumu kapattıktan sonra güvenliğinizi daha da artırabilirsiniz.']
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
        LanguageLine::create(['group' => 'sentence', 'key' => 'click_for_new_company', 'text' => ['en' => 'CLICK FOR A NEW COMPANY', 'tr' => 'YENİ BİR ŞİRKET İÇİN TIKLAYIN']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'add_tag', 'text' => ['en' => 'ADD TAG', 'tr' => 'ETİKET EKLE']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'new_customer', 'text' => ['en' => 'NEW CUSTOMER', 'tr' => 'YENİ MÜŞTERİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'customer_name', 'text' => ['en' => 'CUSTOMER NAME', 'tr' => 'MÜŞTERİ ADI']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'short_name', 'text' => ['en' => 'SHORT NAME', 'tr' => 'KISA AD']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'current_code', 'text' => ['en' => 'CURRENT CODE', 'tr' => 'DÖVİZ KODU']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'abroad_address', 'text' => ['en' => 'ABROAD ADDRESS', 'tr' => 'YURT DIŞI ADRESİ']]);
        LanguageLine::create(['group' => 'sentence', 'key' => 'ebilling_taxpayer', 'text' => ['en' => 'E-BILLING TAXPAYER', 'tr' => 'E-FATURA VERGİ MÜKELLİFİ']]);
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








    }
}
