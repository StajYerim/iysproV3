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
        // money unit
        LanguageLine::create(['group'=> 'money', 'key'=> 'turkish_lira', 'text'=> ['en'=> 'TURKISH LIRA', 'tr'=> 'TÜRK LİRASI']]);
        LanguageLine::create(['group'=> 'money', 'key'=> 'cent', 'text'=> ['en'=> 'CENT', 'tr'=> 'KRŞ']]);

        // number area
        LanguageLine::create(['group'=> 'number', 'key'=> 'one', 'text'=> ['en'=> 'ONE', 'tr'=> 'BİR']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'two', 'text'=> ['en'=> 'TWO', 'tr'=> 'İKİ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'three', 'text'=> ['en'=> 'THREE', 'tr'=> 'ÜÇ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'four', 'text'=> ['en'=> 'FOUR', 'tr'=> 'DÖRT']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'five', 'text'=> ['en'=> 'FIVE', 'tr'=> 'BEŞ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'six', 'text'=> ['en'=> 'SIX', 'tr'=> 'ALTI']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'seven', 'text'=> ['en'=> 'SEVEN', 'tr'=> 'YEDİ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'eight', 'text'=> ['en'=> 'EIGHT', 'tr'=> 'SEKİZ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'nine', 'text'=> ['en'=> 'NINE', 'tr'=> 'DOKUZ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'ten', 'text'=> ['en'=> 'TEN', 'tr'=> 'ON']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'twenty', 'text'=> ['en'=> 'TWENTY', 'tr'=> 'YİRMİ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'thirty', 'text'=> ['en'=> 'THIRTY', 'tr'=> 'OTUZ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'fourty', 'text'=> ['en'=> 'FOURTY', 'tr'=> 'KIRK']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'fifty', 'text'=> ['en'=> 'FIFTY', 'tr'=> 'ELLİ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'sixty', 'text'=> ['en'=> 'SIXTY', 'tr'=> 'ALTMIŞ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'seventy', 'text'=> ['en'=> 'SEVENTY', 'tr'=> 'YETMİŞ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'eighty', 'text'=> ['en'=> 'EIGHTY', 'tr'=> 'SEKSEN']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'ninety', 'text'=> ['en'=> 'NINETY', 'tr'=> 'DOKSAN']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'hundred', 'text'=> ['en'=> 'HUNDRED', 'tr'=> 'YÜZ']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'thousand', 'text'=> ['en'=> 'THOUSAND', 'tr'=> 'BİN']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'million', 'text'=> ['en'=> 'MILLION', 'tr'=> 'MİLYON']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'billion', 'text'=> ['en'=> 'BILLION', 'tr'=> 'MİLYAR']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'trillion', 'text'=> ['en'=> 'TRILLION', 'tr'=> 'TRILLION']]);
        LanguageLine::create(['group'=> 'number', 'key'=> 'zillion', 'text'=> ['en'=> 'ZILLION', 'tr'=> 'KATRİLYON']]);

        // month area
        LanguageLine::create(['group'=> 'month', 'key'=> 'january', 'text'=> ['en'=> 'JANUARY', 'tr'=> 'OCAK']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'february', 'text'=> ['en'=> 'FEBRUARY', 'tr'=> 'ŞUBAT']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'march', 'text'=> ['en'=> 'MARCH', 'tr'=> 'MART']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'april', 'text'=> ['en'=> 'APRIL', 'tr'=> 'NİSAN']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'may', 'text'=> ['en'=> 'MAY', 'tr'=> 'MAYIS']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'june', 'text'=> ['en'=> 'JUNE', 'tr'=> 'HAZİRAN']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'july', 'text'=> ['en'=> 'JULY', 'tr'=> 'TEMMUZ']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'august', 'text'=> ['en'=> 'AUGUST', 'tr'=> 'AĞUSTOS']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'september', 'text'=> ['en'=> 'SEPTEMBER', 'tr'=> 'EYLÜL']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'october', 'text'=> ['en'=> 'OCTOBER', 'tr'=> 'EKİM']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'november', 'text'=> ['en'=> 'NOVEMBER', 'tr'=> 'KASIM']]);
        LanguageLine::create(['group'=> 'month', 'key'=> 'december', 'text'=> ['en'=> 'DECEMBER', 'tr'=> 'ARALIK']]);

        // time area
        LanguageLine::create(['group'=> 'time', 'key'=> 'today', 'text'=> ['en'=> 'TODAY', 'tr'=> 'BUGÜN']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'yesterday', 'text'=> ['en'=> 'YESTERDAY', 'tr'=> 'DÜN']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'last_7_days', 'text'=> ['en'=> 'LAST 7 DAYS', 'tr'=> 'SON 7 GÜN']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'last_30_days', 'text'=> ['en'=> 'LAST 30 DAYS', 'tr'=> 'SON 30 GÜN']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'this_month', 'text'=> ['en'=> 'THIS MONTH', 'tr'=> 'BU AY']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'last_month', 'text'=> ['en'=> 'LAST MONTH', 'tr'=> 'GEÇEN AY']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'special_date', 'text'=> ['en'=> 'SPECIAL DATE', 'tr'=> 'ÖZEL TARİH']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'mo', 'text'=> ['en'=> 'MO', 'tr'=> 'PT']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'tu', 'text'=> ['en'=> 'TU', 'tr'=> 'SA']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'we', 'text'=> ['en'=> 'WE', 'tr'=> 'ÇA']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'th', 'text'=> ['en'=> 'TH', 'tr'=> 'PE']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'fr', 'text'=> ['en'=> 'FR', 'tr'=> 'CU']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'sa', 'text'=> ['en'=> 'SA', 'tr'=> 'CT']]);
        LanguageLine::create(['group'=> 'time', 'key'=> 'su', 'text'=> ['en'=> 'SU', 'tr'=> 'PA']]);

        // word area
        LanguageLine::create(['group'=> 'word', 'key'=> 'english', 'text'=> ['en'=> 'ENGLISH', 'tr'=> 'İNGİLİZCE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'turkish', 'text'=> ['en'=> 'TURKISH', 'tr'=> 'TÜRKÇE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'dashboard', 'text'=> ['en'=> 'DASHBOARD', 'tr'=> 'GÖSTERGE PANELİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'password', 'text'=> ['en'=> 'PASSWORD', 'tr'=> 'ŞİFRE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'task', 'text'=> ['en'=> 'TASKS', 'tr'=> 'GÖREVLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'sales', 'text'=> ['en'=> 'SALES', 'tr'=> 'SATIŞLAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'purchases', 'text'=> ['en'=> 'PURCHASES', 'tr'=> 'SATIN ALMALAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'finance', 'text'=> ['en'=> 'FINANCE', 'tr'=> 'FİNANS']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'stock', 'text'=> ['en'=> 'STOCK', 'tr'=> 'STOK']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'ecommerce', 'text'=> ['en'=> 'E-COMMERCE', 'tr'=> 'E-TİCARET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'applications', 'text'=> ['en'=> 'APPLICATIONS', 'tr'=> 'UYGULAMALAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'users', 'text'=> ['en'=> 'USERS', 'tr'=> 'KULLANICILAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'logout', 'text'=> ['en'=> 'LOGOUT', 'tr'=> 'ÇIKIŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'login', 'text'=> ['en'=> 'LOGIN', 'tr'=> 'GİRİŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'no', 'text'=> ['en'=>'NO','tr'=>'HAYIR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'yes', 'text'=> ['en'=>'YES','tr'=>'EVET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'okay', 'text'=> ['en'=>'OKAY','tr'=>'TAMAM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'board', 'text'=> ['en'=>'BOARD','tr'=>'PANO']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'calendar', 'text'=> ['en'=>'CALENDAR','tr'=>'TAKVİM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'offers', 'text'=> ['en'=>'OFFERS','tr'=>'TEKLİFLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'orders', 'text'=> ['en'=>'ORDERS','tr'=>'SİPARİŞLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'customer', 'text'=> ['en'=>'CUSTOMER','tr'=>'MÜŞTERİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'customers', 'text'=> ['en'=>'CUSTOMERS','tr'=>'MÜŞTERİLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'supplier', 'text'=> ['en'=>'SUPPLIER','tr'=>'TEDARİKÇİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'suppliers', 'text'=> ['en'=>'SUPPLIERS','tr'=>'TEDARİKÇİLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'expenses', 'text'=> ['en'=>'EXPENSES','tr'=>'GİDERLERLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'account', 'text'=> ['en'=>'ACCOUNT','tr'=>'HESAP']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'product', 'text'=> ['en'=>'PRODUCT','tr'=>'ÜRÜN']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'products', 'text'=> ['en'=>'PRODUCTS','tr'=>'ÜRÜNLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'date', 'text'=> ['en'=>'DATE','tr'=>'TARİH']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'total', 'text'=> ['en'=>'TOTAL','tr'=>'TOPLAM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'status', 'text'=> ['en'=>'STATUS','tr'=>'DURUM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'description', 'text'=> ['en'=>'DESCRIPTION','tr'=>'AÇIKLAMA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'currency', 'text'=> ['en'=> 'CURRENCY', 'tr'=> 'PARA BİRİMİ']        ]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'service', 'text'=> ['en'=> 'SERVICE', 'tr'=> 'HİZMET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'quantity', 'text'=> ['en'=> 'QUANTITY', 'tr'=> 'MİKTAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'unit', 'text'=> ['en'=> 'UNIT', 'tr'=> 'BİRİM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'vat', 'text'=> ['en'=> 'VAT', 'tr'=> 'KDV']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'save', 'text'=> ['en'=> 'SAVE', 'tr'=> 'KAYDET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'email', 'text'=> ['en'=> 'E-MAIL', 'tr'=> 'E-POSTA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'phone', 'text'=> ['en'=> 'PHONE', 'tr'=> 'TELEFON']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'fax', 'text'=> ['en'=> 'FAX', 'tr'=> 'FAKS']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'province', 'text'=> ['en'=> 'PROVINCE', 'tr'=> 'İL']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'district', 'text'=> ['en'=> 'DISTRICT', 'tr'=> 'İLÇE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'contact', 'text'=> ['en'=> 'CONTACT', 'tr'=> 'İLETİŞİM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'back', 'text'=> ['en'=> 'BACK', 'tr'=> 'GERİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'next', 'text'=> ['en'=> 'NEXT', 'tr'=> 'İLERİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'note', 'text'=> ['en'=> 'NOTE', 'tr'=> 'NOT']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'deadline', 'text'=> ['en'=> 'DEADLINE', 'tr'=> 'SON ÖDEME TARİHİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'discount', 'text'=> ['en'=> 'DISCOUNT', 'tr'=> 'İNDİRİM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'action', 'text'=> ['en'=> 'ACTION', 'tr'=> 'AKSİYON']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'name', 'text'=> ['en'=> 'NAME', 'tr'=> 'ADI']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'amount', 'text'=> ['en'=> 'AMOUNT', 'tr'=> 'TUTAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'close', 'text'=> ['en'=> 'CLOSE', 'tr'=> 'KAPAT']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'iban', 'text'=> ['en'=> 'IBAN', 'tr'=> 'IBAN']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'organizer', 'text'=> ['en'=> 'ORGANIZER', 'tr'=> 'ORGANİZATÖR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'location', 'text'=> ['en'=> 'LOCATION', 'tr'=> 'LOKASYON']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'sum', 'text'=> ['en'=> 'SUM', 'tr'=> 'MEBLAĞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'code', 'text'=> ['en'=> 'CODE', 'tr'=> 'KOD']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'barcode', 'text'=> ['en'=> 'BARCODE', 'tr'=> 'BARKOD']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'category', 'text'=> ['en'=> 'CATEGORY', 'tr'=> 'KATEGORİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'tax', 'text'=> ['en'=> 'TAX', 'tr'=> 'VERGİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'all', 'text'=> ['en'=> 'ALL', 'tr'=> 'TÜM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'new', 'text'=> ['en'=> 'NEW', 'tr'=> 'YENİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'approve', 'text'=> ['en'=> 'APPROVE', 'tr'=> 'ONAYLA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'approved', 'text'=> ['en'=> 'APPROVED', 'tr'=> 'ONAYLI']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'rejected', 'text'=> ['en'=> 'REJECTED', 'tr'=> 'REDDEDİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'shipped', 'text'=> ['en'=> 'SHIPPED', 'tr'=> 'SEVK EDİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'delivered', 'text'=> ['en'=> 'DELIVERED', 'tr'=> 'TESLİM EDİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'completed', 'text'=> ['en'=> 'COMPLETED', 'tr'=> 'TAMAMLANDI']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'claimed', 'text'=> ['en'=> 'CLAIMED', 'tr'=> 'TALEP EDİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'search', 'text'=> ['en'=> 'SEARCH', 'tr'=> 'ARAMA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'api', 'text'=> ['en'=> 'API', 'tr'=> 'API']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'filter', 'text'=> ['en'=> 'FILTER', 'tr'=> 'FILTRELE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'company', 'text'=> ['en'=> 'COMPANY', 'tr'=> 'ŞİRKET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'balance', 'text'=> ['en'=> 'BALANCE', 'tr'=> 'BAKİYE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'edit', 'text'=> ['en'=> 'EDIT', 'tr'=> 'DÜZENLE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'editor', 'text'=> ['en'=> 'EDITOR', 'tr'=> 'DÜZENLEYEN']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'editing', 'text'=> ['en'=> 'EDITING', 'tr'=> 'DÜZENLEME']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'delete', 'text'=> ['en'=> 'DELETE', 'tr'=> 'SİL']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'share', 'text'=> ['en'=> 'SHARE', 'tr'=> 'PAYLAŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'type', 'text'=> ['en'=> 'TYPE', 'tr'=> 'TÜR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'date', 'text'=> ['en'=> 'DATE', 'tr'=> 'TARİH']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'remaining', 'text'=> ['en'=> 'REMAINING', 'tr'=> 'KALAN']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'transfer', 'text'=> ['en'=> 'TRANSFER', 'tr'=> 'TRANSFER YAP']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'charge', 'text'=> ['en'=> 'CHARGE', 'tr'=> 'PARA ÇEK']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'print', 'text'=> ['en'=> 'PRINT', 'tr'=> 'YAZDIR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'dispatch', 'text'=> ['en'=> 'DISPATCH', 'tr'=> 'SEVK']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'serial', 'text'=> ['en'=> 'SERIAL', 'tr'=> 'SERİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'hour', 'text'=> ['en'=> 'HOUR', 'tr'=> 'SAAT']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'archive', 'text'=> ['en'=> 'ARCHIVE', 'tr'=> 'ARCHIVE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'number', 'text'=> ['en'=> 'NUMBER', 'tr'=> 'NUMARA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'informations', 'text'=> ['en'=> 'INFORMATIONS', 'tr'=> 'BİLGİLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'cost', 'text'=> ['en'=> 'COST', 'tr'=> 'MALİYET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'language', 'text'=> ['en'=> 'LANGUAGE', 'tr'=> 'DİL']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'view', 'text'=> ['en'=> 'VIEW', 'tr'=> 'GÖRÜNTÜLEME']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'submit', 'text'=> ['en'=> 'SUBMIT', 'tr'=> 'GÖNDER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'permissions', 'text'=> ['en'=> 'PERMISSIONS', 'tr'=> 'İZİNLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'permission', 'text'=> ['en'=> 'PERMISSION', 'tr'=> 'İZİN']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'role', 'text'=> ['en'=> 'ROLE', 'tr'=> 'RÜTBE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'module', 'text'=> ['en'=> 'MODULE', 'tr'=> 'MODÜL']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'read', 'text'=> ['en'=> 'READ', 'tr'=> 'OKUMA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'create', 'text'=> ['en'=> 'CREATE', 'tr'=> 'OLUŞTURMA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'profile', 'text'=> ['en'=> 'PROFILE', 'tr'=> 'PROFİL']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'mobile', 'text'=> ['en'=> 'MOBILE', 'tr'=> 'CEP']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'group', 'text'=> ['en'=> 'GROUP', 'tr'=> 'GRUP']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'short', 'text'=> ['en'=> 'SHORT', 'tr'=> 'KISA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'show', 'text'=> ['en'=> 'SHOW', 'tr'=> 'GÖSTER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'send', 'text'=> ['en'=> 'SEND', 'tr'=> 'GÖNDER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'activation', 'text'=> ['en'=> 'ACTIVATION', 'tr'=> 'AKTİVASYON']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'sector', 'text'=> ['en'=> 'SECTOR', 'tr'=> 'SEKTÖR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'register', 'text'=> ['en'=> 'REGISTER', 'tr'=> 'KAYDOL']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'receiver', 'text'=> ['en'=> 'RECEIVER', 'tr'=> 'ALICI']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'subject', 'text'=> ['en'=> 'SUBJECT', 'tr'=> 'KONU']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'cancel', 'text'=> ['en'=> 'CANCEL', 'tr'=> 'İPTAL ET']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'cash', 'text'=> ['en'=> 'CASH', 'tr'=> 'NAKİT']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'cheque', 'text'=> ['en'=> 'CHEQUE', 'tr'=> 'ÇEK']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'cheques', 'text'=> ['en'=> 'CHEQUES', 'tr'=> 'ÇEKLER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'banks', 'text'=> ['en'=> 'BANKS', 'tr'=> 'BANKALAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'settings', 'text'=> ['en'=> 'SETTINGS', 'tr'=> 'AYARLAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'shortcuts', 'text'=> ['en'=> 'SHORTCUTS', 'tr'=> 'KISAYOLLAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'maps', 'text'=> ['en'=> 'MAPS', 'tr'=> 'HARİTALAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'gallery', 'text'=> ['en'=> 'GALLERY', 'tr'=> 'GALERİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'owner', 'text'=> ['en'=> 'OWNER', 'tr'=> 'HESAP SAHİBİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'invoice', 'text'=> ['en'=> 'INVOICE', 'tr'=> 'FATURA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'icon', 'text'=> ['en'=> 'ICON', 'tr'=> 'İKON']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'route', 'text'=> ['en'=> 'ROUTE', 'tr'=> 'ROTA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'change', 'text'=> ['en'=> 'CHANGE', 'tr'=> 'DEĞİŞTİR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'test', 'text'=> ['en'=> 'TEST', 'tr'=> 'TEST']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'purchase', 'text'=> ['en'=> 'PURCHASE', 'tr'=> 'SATIN ALMA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'expense', 'text'=> ['en'=> 'EXPENSE', 'tr'=> 'GİDER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'paid', 'text'=> ['en'=> 'PAID', 'tr'=> 'ÖDENDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'payable', 'text'=> ['en'=> 'PAYABLE', 'tr'=> 'ÖDENECEK']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'request', 'text'=> ['en'=> 'REQUEST', 'tr'=> 'TALEP']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'add', 'text'=> ['en'=> 'ADD', 'tr'=> 'EKLE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'order', 'text'=> ['en'=> 'ORDER', 'tr'=> 'SİPARİŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'price', 'text'=> ['en'=> 'PRICE', 'tr'=> 'FİYAT']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'retail', 'text'=> ['en'=> 'RETAIL', 'tr'=> 'PAREKENDE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'whosale', 'text'=> ['en'=> 'WHOSALE', 'tr'=> 'TOPTAN']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'production', 'text'=> ['en'=> 'PRODUCTION', 'tr'=> 'ÜRETİM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'success', 'text'=> ['en'=> 'SUCCESS', 'tr'=> 'BAŞARI']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'successfull', 'text'=> ['en'=> 'SUCCESSFULL', 'tr'=> 'BAŞARILI']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'error', 'text'=> ['en'=> 'ERROR', 'tr'=> 'HATA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'month', 'text'=> ['en'=> 'MONTH', 'tr'=> 'AY']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'receipt', 'text'=> ['en'=> 'RECEIPT', 'tr'=> 'FİŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'entry', 'text'=> ['en'=> 'ENTRY', 'tr'=> 'GİRİŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'exit', 'text'=> ['en'=> 'EXIT', 'tr'=> 'ÇIKIŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'unplanning', 'text'=> ['en'=> 'UNPLANNING', 'tr'=> 'GÜNÜ GELMEMİŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'delayed', 'text'=> ['en'=> 'DELAYED', 'tr'=> 'GECİKMİŞ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'payments', 'text'=> ['en'=> 'PAYMENTS', 'tr'=> 'ÖDEMELER']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'collections', 'text'=> ['en'=> 'COLLECTIONS', 'tr'=> 'TAHSİLATLAR']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'week', 'text'=> ['en'=> 'WEEK', 'tr'=> 'HAFTA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'draft', 'text'=> ['en'=> 'DRAFT', 'tr'=> 'TASLAK']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'cancelled', 'text'=> ['en'=> 'CANCELLED', 'tr'=> 'İPTAL EDİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'accepted', 'text'=> ['en'=> 'ACCEPTED', 'tr'=> 'KABUL EDİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'retreated', 'text'=> ['en'=> 'RETREATED', 'tr'=> 'GERİ ÇEKİLDİ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'pending', 'text'=> ['en'=> 'PENDING', 'tr'=> 'BEKLEMEDE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'waybill', 'text'=> ['en'=> 'WAYBILL', 'tr'=> 'İRSALİYE']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'apply', 'text'=> ['en'=> 'APPLY', 'tr'=> 'UYGULA']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'transaction', 'text'=> ['en'=> 'TRANSACTION', 'tr'=> 'İŞLEM']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'debt', 'text'=> ['en'=> 'DEBT', 'tr'=> 'BORÇ']]);
        LanguageLine::create(['group'=> 'word', 'key'=> 'credit', 'text'=> ['en'=> 'CREDIT', 'tr'=> 'ALACAK']]);


        // sentence area
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'logout_info', 'text'=> [
            'en'=>
                'You can improve your security further after logging out by closing this opened browser',
            'tr'=>
                'Bu açılmış tarayıcıyı kapatarak oturumu kapattıktan sonra güvenliğinizi daha da artırabilirsiniz.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'currency_type_information', 'text'=> [
            'en'=>
                'If you are going to get a payment through fixed exchange rate, you must choose Turkish Lira as the currency type.',
            'tr'=>
                'Eğer sabit kur üzerinden ödeme alacaksanız döviz cinsi olarak Türk Lirası seçmelisiniz.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'there_is_no_offer_movement', 'text'=> [
            'en'=>
                'THERE IS NO OFFER MOVEMENT',
            'tr'=>
                'TEKLİF HAREKETİ BULUNMAMAKTADIR']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'waybills_of_all_products', 'text'=> [
            'en'=>
                'PRESENTATIONS OF ALL THE PRODUCTS IS PRESENTED. SEE THE LIST OF PRINCIPLES FOR RETRIEVING',
            'tr'=>
                'TÜM ÜRÜNLERİN İRSALİYELERİ YAZDIRILMIŞTIR. YENİDEN YAZDIRMAK İÇİN İRSALİYE LİSTESİNE BAKIN']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'not_created_waybill', 'text'=> [
            'en'=>
                'We have not created a delivery note for the order you want to create the invoice. This does not preclude billing.',
            'tr'=>
                'Faturasını oluşturmak istediğiniz sipariş için irsaliye oluşturulmamıştır.Bu durum fatura kesmenize engel değildir.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'service_product_transaction_history', 'text'=> [
            'en'=>
                'Service / Product transaction history is not available, you can see past transactions here.',
            'tr'=>
                'Hizmet / Ürünün işlem geçmişi yok, geçmiş işlemleri burada görebileceksiniz.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'enter_username_or_email', 'text'=> [
            'en'=>
                'Please enter email address',
            'tr'=>
                'Lütfen e-posta adresinizi giriniz.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'confirm_email_via_link', 'text'=> [
            'en'=>
                'Please confirm your email via link sent to your email. If it is not in your inbox, please check spam folder ',
            'tr'=>
                'Lütfen e-postanıza gönderilen bağlantı yoluyla e-postanızı onaylayın. Gelen kutunuzda değilse, lütfen spam klasörünü kontrol edin']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'thank_you_for_your_registration', 'text'=> [
            'en'=>
                'Thank you for your registration!',
            'tr'=>
                'Kaydınız için teşekkürler!']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'needed_to_verify_your_account', 'text'=> [
            'en'=>
                'Needed to verify your account',
            'tr'=>
                'Hesabınızı doğrulamanız gerekiyor']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'needed_to_enter_the_website', 'text'=> [
            'en'=>
                'Needed to enter the website',
            'tr'=>
                'Websiteyi girmeniz gerekiyor']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'confirmation_email_sent', 'text'=> [
            'en'=>
                'Confirmation E-mail Sent',
            'tr'=>
                'Onay E-postası Gönderildi']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'click_on_activation_link', 'text'=> [
            'en'=>
                'Sign up successful. Please check your email.You will receive an email. Please click on activation link to activate your user account.',
            'tr'=>
                'Kayıt başarılı. Lütfen e-postanızı kontrol edin. Bir e-posta alacaksınız. Kullanıcı hesabınızı etkinleştirmek için lütfen aktivasyon linkine tıklayın.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'you_do_not_have_a_bank_account', 'text'=> [
            'en'=>
                'You do not have a bank account you can check.',
            'tr'=>
                'Çek verebileceğiniz banka hesabınız bulunmuyor.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'there_are_no_customer_cheque', 'text'=> [
            'en'=>
                'There are no customer cheque that you can use.',
            'tr'=>
                'Kullanabileceğiniz müşteri çeki bulunmuyor.']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_page_you_request_could_not_be_found', 'text'=> [
            'en'=>
                'The page you requested could not be found, either contact your webmaster or try again. Use your browsers',
            'tr'=>
                'İstediğiniz sayfa bulunamadı, web yöneticinizle iletişime geçin veya tekrar deneyin. Tarayıcınızı kullanın']
        ]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'security_further_after_logging_out', 'text'=> [
            'en'=>
                'You can improve your security further after logging out by closing this opened browser',
            'tr'=>
                'Bu açılmış tarayıcıyı kapatarak oturumu kapattıktan sonra güvenliğinizi daha da artırabilirsiniz.']
        ]);



        LanguageLine::create(['group'=> 'sentence', 'key'=> 'user_name', 'text'=> ['en'=> 'USER NAME', 'tr'=> 'KULLANICI ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'recent_project', 'text'=> ['en'=> 'RECENT PROJECT', 'tr'=> 'SON PROJELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_profile', 'text'=> ['en'=> 'COMPANY PROFILE', 'tr'=> 'ŞİRKET PROFİLİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_access', 'text'=> ['en'=> 'COMPANY ACCESS', 'tr'=> 'ŞİRKET ERİŞİMİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_access', 'text'=> ['en'=> 'NO ACCESS', 'tr'=> 'ERİŞİM İZNİ YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'user_profile', 'text'=> ['en'=> 'USER PROFILE', 'tr'=> 'KULLANICI PROFİLİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'general_settings', 'text'=> ['en'=> 'GENERAL SETTINGS', 'tr'=> 'GENEL AYARLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'offer_settings', 'text'=> ['en'=> 'OFFER SETTINGS', 'tr'=> 'TEKLİF AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_settings', 'text'=> ['en'=> 'SALES SETTINGS', 'tr'=> 'SATIŞ AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_settings', 'text'=> ['en'=> 'PURCHASE SETTINGS', 'tr'=> 'SATIN ALMA AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_settings', 'text'=> ['en'=> 'PRODUCT SETTINGS', 'tr'=> 'ÜRÜN AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'user_settings', 'text'=> ['en'=> 'USER SETTINGS', 'tr'=> 'KULLANICI AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'current_account_settings', 'text'=> ['en'=> 'CURRENT ACCOUNT SETTINGS', 'tr'=> 'CARİ HESAP AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'application_settings', 'text'=> ['en'=> 'APPLICATIN SETTINGS', 'tr'=> 'UYGULAMA AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_profile_settings', 'text'=> ['en'=> 'COMPANY PROFILE SETTINGS', 'tr'=> 'FİRMA PROFİL AYARLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'api_informations', 'text'=> ['en'=> 'API INFORMATIONS', 'tr'=> 'API BİLGİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'api_key', 'text'=> ['en'=> 'API KEY', 'tr'=> 'API ANAHTARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'api_password', 'text'=> ['en'=> 'API PASSWORD', 'tr'=> 'API ŞİFRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_reports', 'text'=> ['en'=> 'SALES REPORTS', 'tr'=> 'SATIŞ RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_reports', 'text'=> ['en'=> 'PURCHASE REPORTS', 'tr'=> 'SATIN ALMA RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_reports_table', 'text'=> ['en'=> 'PURCHASE REPORTS TABLE', 'tr'=> 'SATIN ALMA RAPORLARI TABLOSU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'payment_reports', 'text'=> ['en'=> 'PAYMENT REPORTS', 'tr'=> 'ÖDEME RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'expenses_reports', 'text'=> ['en'=> 'EXPENSES REPORT', 'tr'=> 'GİDER RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'vat_reports', 'text'=> ['en'=> 'VAT REPORTS', 'tr'=> 'KDV RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'collect_reports', 'text'=> ['en'=> 'COLLECT REPORTS', 'tr'=> 'TAHSİLAT RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'services_and_products', 'text'=> ['en'=> 'SERVICES AND PRODUCTS', 'tr'=> 'HİZMETLER VE ÜRÜNLER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_movements', 'text'=> ['en'=> 'STOCK MOVEMENTS', 'tr'=> 'STOK HAREKETLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'products_in_stock', 'text'=> ['en'=> 'PRODUCTS IN STOCK', 'tr'=> 'STOKTAKİ ÜRÜNLER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_request', 'text'=> ['en'=> 'NEW REQUEST', 'tr'=> 'YENİ TALEP']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_order', 'text'=> ['en'=> 'NEW ORDER', 'tr'=> 'YENİ SİPARİŞ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'request_date', 'text'=> ['en'=> 'REQUEST DATE', 'tr'=> 'TALEP TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'validity_date', 'text'=> ['en'=> 'VALIDITY DATE', 'tr'=> 'GEÇERLİLİK TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'unit_price', 'text'=> ['en'=> 'UNIT PRICE', 'tr'=> 'BİRİM FİYATI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'choose_product', 'text'=> ['en'=> 'CHOOSE PRODUCT', 'tr'=> 'ÜRÜN SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_matching_options', 'text'=> ['en'=> 'SORRY, NO MATCHING OPTIONS', 'tr'=> 'ÜZGÜNÜZ, EŞLEŞME BULUNAMADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_new_row', 'text'=> ['en'=> 'ADD NEW ROW', 'tr'=> 'YENİ SATIR EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'detailed_description', 'text'=> ['en'=> 'DETAILED DESCRIPTION', 'tr'=> 'DETAYLI AÇIKLAMA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sub_total', 'text'=> ['en'=> 'SUB TOTAL', 'tr'=> 'ARA TOPLAM']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_vat', 'text'=> ['en'=> 'TOTAL VAT', 'tr'=> 'TOPLAM KDV']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'general_total', 'text'=> ['en'=> 'GENERAL TOTAL', 'tr'=> 'GENEL TOPLAM']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'choose_company', 'text'=> ['en'=> 'CHOOSE COMPANY', 'tr'=> 'ŞİRKET SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'click_for_a_new_company', 'text'=> ['en'=> 'CLICK FOR A NEW COMPANY', 'tr'=> 'YENİ BİR ŞİRKET İÇİN TIKLAYIN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_tag', 'text'=> ['en'=> 'ADD TAG', 'tr'=> 'ETİKET EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_customer', 'text'=> ['en'=> 'NEW CUSTOMER', 'tr'=> 'YENİ MÜŞTERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'customer_name', 'text'=> ['en'=> 'CUSTOMER NAME', 'tr'=> 'MÜŞTERİ ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'customer_informations', 'text'=> ['en'=> 'CUSTOMER INFORMATIONS', 'tr'=> 'MÜŞTERİ BİLGİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'short_name', 'text'=> ['en'=> 'SHORT NAME', 'tr'=> 'KISA AD']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'current_code', 'text'=> ['en'=> 'CURRENT CODE', 'tr'=> 'CARİ KODU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'abroad_address', 'text'=> ['en'=> 'ABROAD ADDRESS', 'tr'=> 'YURT DIŞI ADRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'ebilling_taxpayer', 'text'=> ['en'=> 'E-BILLING TAXPAYER', 'tr'=> 'E-FATURA VERGİ MÜKELLİFİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'billing_address', 'text'=> ['en'=> 'BILLING ADDRESS', 'tr'=> 'FATURA ADRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'billing_informations', 'text'=> ['en'=> 'BILLING INFORMATIONS', 'tr'=> 'FATURA BİLGİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'shipping_address', 'text'=> ['en'=> 'SHIPPING ADDRESS', 'tr'=> 'TESLİMAT ADRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'tax_office', 'text'=> ['en'=> 'TAX OFFICE', 'tr'=> 'VERGİ DAİRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'iban_number', 'text'=> ['en'=> 'IBAN NUMBER', 'tr'=> 'IBAN NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'vkn_tckn', 'text'=> ['en'=> 'VKN_TCKN', 'tr'=> 'VKN_TCKN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'order_date', 'text'=> ['en'=> 'ORDER DATE', 'tr'=> 'SİPARİŞ TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'payable_date', 'text'=> ['en'=> 'PAYABLE DATE', 'tr'=> 'ÖDEME TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_expense', 'text'=> ['en'=> 'ADD EXPENSE', 'tr'=> 'GİDER EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'expense_type', 'text'=> ['en'=> 'EXPENSE TYPE', 'tr'=> 'GİDER TÜRÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'paid_account', 'text'=> ['en'=> 'PAID ACCOUNT', 'tr'=> 'ÖDENECEK HESAP']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'select_account', 'text'=> ['en'=> 'SELECT ACCOUNT', 'tr'=> 'HESAP SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cash_account', 'text'=> ['en'=> 'CASH ACCOUNT', 'tr'=> 'KASA HESABI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cash_flow', 'text'=> ['en'=> 'CASH FLOW', 'tr'=> 'NAKİT AKIŞI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_name', 'text'=> ['en'=> 'ACCOUNT NAME', 'tr'=> 'HESAB ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_safe', 'text'=> ['en'=> 'ADD SAFE', 'tr'=> 'KASA EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_bank', 'text'=> ['en'=> 'ADD BANK', 'tr'=> 'BANKA EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_credit_account', 'text'=> ['en'=> 'ADD CREDIT ACCOUNT', 'tr'=> 'KREDİ HESABI EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'currency_type', 'text'=> ['en'=> 'CURRENCY TYPE', 'tr'=> 'DÖVİZ TÜRÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'opening_balance', 'text'=> ['en'=> 'OPENING BALANCE', 'tr'=> 'AÇILIŞ BAKİYESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'opening_balance_date', 'text'=> ['en'=> 'OPENING BALANCE DATE', 'tr'=> 'AÇILIŞ BAKİYESİ TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'bank_name', 'text'=> ['en'=> 'BANK NAME', 'tr'=> 'BANKA ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'bank_branch', 'text'=> ['en'=> 'BANK BRANCH', 'tr'=> 'BANKA ŞUBESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_number', 'text'=> ['en'=> 'ACCOUNT NUMBER', 'tr'=> 'HESAP NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cheque_available', 'text'=> ['en'=> 'CHEQUE AVAILABLE', 'tr'=> 'ÇEK KULLANILABİLİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'expiry_date', 'text'=> ['en'=> 'EXPIRY DATE', 'tr'=> 'SON KULLANMA TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_quantity', 'text'=> ['en'=> 'STOCK QUANTITY', 'tr'=> 'STOK MİKTARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_price', 'text'=> ['en'=> 'PURCHASE PRICE', 'tr'=> 'ALIŞ FİYATI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_price', 'text'=> ['en'=> 'SALES PRICE', 'tr'=> 'SATIŞ FİYATI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_product', 'text'=> ['en'=> 'NEW PRODUCT', 'tr'=> 'YENİ ÜRÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_name', 'text'=> ['en'=> 'PRODUCT NAME', 'tr'=> 'ÜRÜN ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_image', 'text'=> ['en'=> 'PRODUCT IMAGE', 'tr'=> 'ÜRÜN RESMİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_detail', 'text'=> ['en'=> 'PRODUCT DETAIL', 'tr'=> 'ÜRÜN DETAYI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_follow_up', 'text'=> ['en'=> 'STOCK FOLLOW UP', 'tr'=> 'STOK TAKİBİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_type', 'text'=> ['en'=> 'STOCK TYPE', 'tr'=> 'STOK TÜRÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'select_vat', 'text'=> ['en'=> 'SELECT VAT', 'tr'=> 'KDV SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'edition_date', 'text'=> ['en'=> 'EDITION DATE', 'tr'=> 'BASIM TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'in_stock', 'text'=> ['en'=> 'IN STOCK', 'tr'=> 'STOKTA VAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'out_stock', 'text'=> ['en'=> 'OUT STOCK', 'tr'=> 'STOKTA YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_action', 'text'=> ['en'=> 'NEW ACTION', 'tr'=> 'YENİ AKSİYON']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'edit_date', 'text'=> ['en'=> 'EDIT DATE', 'tr'=> 'DÜZENLENME TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'receipt_type', 'text'=> ['en'=> 'RECEIPT TYPE', 'tr'=> 'FİŞ TÜRÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'choose_receipt_type', 'text'=> ['en'=> 'CHOOSE RECEIPT TYPE', 'tr'=> 'FİŞ TÜRÜ SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'production_input_receipt', 'text'=> ['en'=> 'PRODUCTION INPUT RECEIPT', 'tr'=> 'ÜRETİMDEN GİRİŞ FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'counting_excess_receipt', 'text'=> ['en'=> 'COUNTING EXCESS RECEIPT', 'tr'=> 'SAYIM FAZLASI FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'entry_waybill_receipt', 'text'=> ['en'=> 'ENTRY WAYBILL RECEIPT', 'tr'=> 'GİRİŞ İRSALİYE FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cikis_irsaliyesi', 'text'=> ['en'=> 'cikis_irsaliyesi [en]', 'tr'=> 'ÇIKIŞ İRSALİYESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'perakende_satis_irsaliyesi', 'text'=> ['en'=> 'perakende_satis_irsaliyesi [en]', 'tr'=> 'PERAKENDE SATIŞ İRSALİYESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'alim_iade_irsaliyesi', 'text'=> ['en'=> 'alim_iade_irsaliyesi [en]', 'tr'=> 'ALIM İADE İRSALİYESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sayim_eksigi_fisi', 'text'=> ['en'=> 'sayim_eksigi_fisi [en]', 'tr'=> 'SAYIM EKSİĞİ FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'fire_fisi', 'text'=> ['en'=> 'fire_fisi [en]', 'tr'=> 'FİRE FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sarf_fisi', 'text'=> ['en'=> 'sarf_fisi [en]', 'tr'=> 'SARF FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'numune_cikis_fisi', 'text'=> ['en'=> 'numune_cikis_fisi [en]', 'tr'=> 'NUMUNE ÇIKIŞ FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'uretime_cikis_fisi', 'text'=> ['en'=> 'uretime_cikis_fisi [en]', 'tr'=> 'ÜRETİME ÇIKIŞ FİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_product', 'text'=> ['en'=> 'ADD PRODUCT', 'tr'=> 'ÜRÜN EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'edit_profile', 'text'=> ['en'=> 'EDIT PROFILE', 'tr'=> 'PROFİLİ DÜZENLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'tax_office_id', 'text'=> ['en'=> 'TAX OFFICE ID', 'tr'=> 'VKN TCKN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_collection', 'text'=> ['en'=> 'ADD COLLECTION', 'tr'=> 'TAHSİLAT EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_payment', 'text'=> ['en'=> 'ADD PAYMENT', 'tr'=> 'ÖDEME EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'print_request', 'text'=> ['en'=> 'PRINT REQUEST', 'tr'=> 'TALEBİ YAZDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'print_order', 'text'=> ['en'=> 'PRINT ORDER', 'tr'=> 'SİPARİŞİ YAZDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'print_invoice', 'text'=> ['en'=> 'PRINT INVOICE', 'tr'=> 'FATURAYI YAZDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'download_request', 'text'=> ['en'=> 'DOWNLOAD REQUEST', 'tr'=> 'TALEBİ İNDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'download_order', 'text'=> ['en'=> 'DOWNLOAD ORDER', 'tr'=> 'SİPARİŞİ İNDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'download_pdf_account_summary', 'text'=> ['en'=> 'DOWNLOAD PDF ACCOUNT SUMMARY', 'tr'=> 'EKSTRE PDF OLARAK İNDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delete_row', 'text'=> ['en'=> 'DELETE ROW', 'tr'=> 'SATIRI SİL']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_order', 'text'=> ['en'=> 'TOTAL ORDER', 'tr'=> 'TOPLAM SİPARİŞ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'shop_code', 'text'=> ['en'=> 'SHOP CODE', 'tr'=> 'MAĞAZA KODU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_number', 'text'=> ['en'=> 'STOCK NUMBER', 'tr'=> 'STOK NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'check_is_available', 'text'=> ['en'=> 'CHECK IS AVAILABLE', 'tr'=> 'ÇEK KULLANILABİLİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_processed', 'text'=> ['en'=> 'ACCOUNT PROCCESSED', 'tr'=> 'İŞLENDİĞİ HESAP']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'collected_sum', 'text'=> ['en'=> 'COLLECTED SUM', 'tr'=> 'TAHSİL EDİLEN MEBLAĞ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_processed', 'text'=> ['en'=> 'INVOICE PROCESSED', 'tr'=> 'İŞLENDİĞİ FATURA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'currency_processed', 'text'=> ['en'=> 'CURRENCY PROCESSED', 'tr'=> 'İŞLENEN DÖVİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_invoice', 'text'=> ['en'=> 'TOTAL INVOINCE', 'tr'=> 'TOPLAM FATURA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'all_informations', 'text'=> ['en'=> 'ALL INFORMATIONS', 'tr'=> 'TÜM BİLGİLER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'bank_and_branches', 'text'=> ['en'=> 'BANK AND BRANCHES', 'tr'=> 'BANKA VE ŞUBELERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'transfer_to_other_account', 'text'=> ['en'=> 'TRANSFER TO OTHER ACCOUNT', 'tr'=> 'DİĞER HESABA TRANSFER YAP']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_money_input', 'text'=> ['en'=> 'ADD MONEY INPUT', 'tr'=> 'PARA GİRİŞİ EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_money_out', 'text'=> ['en'=> 'ADD MONEY OUT', 'tr'=> 'PARA ÇIKIŞI EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'other_account_transactions', 'text'=> ['en'=> 'OTHER ACCOUNT TRANSACTIONS', 'tr'=> 'DİĞER HESAP İŞLEMLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'transfer_to_account', 'text'=> ['en'=> 'TRANSFER TO ACCOUNT', 'tr'=> 'HESABA TRANSFER YAP']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'money_input', 'text'=> ['en'=> 'MONEY INPUT', 'tr'=> 'PARA GİRİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'money_out', 'text'=> ['en'=> 'MONEY OUT', 'tr'=> 'PARA ÇIKIŞI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'received_date', 'text'=> ['en'=> 'RECEIVED DATE', 'tr'=> 'ALINDIĞI TARİH']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'given_date', 'text'=> ['en'=> 'GİVEN DATE', 'tr'=> 'VERİLDİĞİ TARİH']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'transacted_sum', 'text'=> ['en'=> 'TRANSACTED SUM', 'tr'=> 'İŞLENEN MEBLAĞ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delete_cheque', 'text'=> ['en'=> 'DELETE CHEQUE', 'tr'=> 'ÇEKİ SİL']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_cheque', 'text'=> ['en'=> 'TOTAL CHEQUE', 'tr'=> 'TOPLAM ÇEK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'create_copy', 'text'=> ['en'=> 'CREATE COPY', 'tr'=> 'KOPYA OLUŞTUR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'convert_to_order', 'text'=> ['en'=> 'CONVERT TO ORDER', 'tr'=> 'SİPARİŞE DÖNÜŞTÜR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'order_amount', 'text'=> ['en'=> 'ORDER AMOUNT', 'tr'=> 'SİPARİŞ TUTARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'remaining_amount', 'text'=> ['en'=> 'REMAINING AMOUNT', 'tr'=> 'KALAN TUTAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_balanca', 'text'=> ['en'=> 'ACCOUNT BALANCE', 'tr'=> 'HESAP BAKİYESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'proforma_invoice', 'text'=> ['en'=> 'PROFORMA INVOICE', 'tr'=> 'PROFORM FATURA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'excluding_vat', 'text'=> ['en'=> 'NO VAT', 'tr'=> 'KDVSİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'excluding_vat', 'text'=> ['en'=> 'NO VAT', 'tr'=> 'KDVSİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'including_vat', 'text'=> ['en'=> 'INCLUDING VAT', 'tr'=> 'KDV DAHİL']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'general_amount', 'text'=> ['en'=> 'GENERAL AMOUNT', 'tr'=> 'GENEL TUTAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'orders_created_from_offer', 'text'=> ['en'=> 'ORDERS CREATED FROM OFFER', 'tr'=> 'TEKLİFTEN OLUŞTURULAN SİPARİŞLER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cancel_search', 'text'=> ['en'=> 'CANCEL SEARCH', 'tr'=> 'ARAMAYI İPTAL ET']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'print_waybill', 'text'=> ['en'=> 'PRINT WAYBILL', 'tr'=> 'İRSALİYEYİ YAZDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'waybill_number', 'text'=> ['en'=> 'WAYBILL NUMBER', 'tr'=> 'İRSALİYE NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_selection', 'text'=> ['en'=> 'PRODUCT SELECTION', 'tr'=> 'ÜRÜN SEÇİMİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'waybill_informations', 'text'=> ['en'=> 'WAYBILL INFORMATIONS', 'tr'=> 'İRSALİYE BİLGİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'dispatch_date', 'text'=> ['en'=> 'DISPATCH DATE', 'tr'=> 'SEVK TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'waybill_note', 'text'=> ['en'=> 'WAYBILL NOTE', 'tr'=> 'İRSALİYE NOTU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_number', 'text'=> ['en'=> 'INVOICE NUMBER ', 'tr'=> 'FATURA NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_number', 'text'=> ['en'=> 'INVOICE NUMBER ', 'tr'=> 'FATURA NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_note', 'text'=> ['en'=> 'INVOICE NUMBER ', 'tr'=> 'FATURA NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'bound_waybills', 'text'=> ['en'=> 'BOUND WAYBILLS', 'tr'=> 'BAĞLI İRSALİYELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'confirm_and_print', 'text'=> ['en'=> 'CONFIRM AND PRINT', 'tr'=> 'DOĞRULA VE YAZDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_entry', 'text'=> ['en'=> 'STOCK ENTRY', 'tr'=> 'STOK GİRİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'other_transactions', 'text'=> ['en'=> 'OTHER TRANSACTIONS', 'tr'=> 'DİĞER İŞLEMLER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'create_opening_receipt', 'text'=> ['en'=> 'CREATE OPENING RECEIPT', 'tr'=> 'AÇILIŞ FİŞİ OLUŞTUR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'remove_archive', 'text'=> ['en'=> 'REMOVE ARCHIVE', 'tr'=> 'ARŞİVİ KALDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'remove_image', 'text'=> ['en'=> 'REMOVE IMAGE', 'tr'=> 'RESMİ KALDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'send_to_parasut', 'text'=> ['en'=> 'SEND TO PARAŞÜT','tr'=> "PARAŞÜT'E GÖNDER"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_order', 'text'=> ['en'=> 'SALES ORDER','tr'=> "SATIŞ SİPARİŞİ"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_offer', 'text'=> ['en'=> 'SALES OFFER','tr'=> "SATIŞ TEKLİFİ"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_request', 'text'=> ['en'=> 'PURCHASE REQUEST','tr'=> "SATIN ALMA TALEBİ"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_order', 'text'=> ['en'=> 'PURCHASE ORDER','tr'=> "ALIŞ SİPARİŞİ"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'list_price', 'text'=> ['en'=> 'LIST PRICE','tr'=> "LİSTE FİYATI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'callback_url', 'text'=> ['en'=> 'CALLBACK URL','tr'=> "GERİ DÖNÜŞ URL ADRESİ"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'printing_templates', 'text'=> ['en'=> 'PRINTING TEMPLATES','tr'=> "YAZDIRMA ŞABLONLARI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'production_planning_settings', 'text'=> ['en'=> 'PRODUCTION PLANNING SETTINGS','tr'=> "ÜRETİM PLANLAMA AYARLARI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'warehouse_settings', 'text'=> ['en'=> 'WAREHOUSE SETTINGS','tr'=> "DEPO AYARLARI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'email_settings', 'text'=> ['en'=> 'E-MAIL SETTINGS','tr'=> "E-POSTA AYARLARI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'category_and_tag_settings', 'text'=> ['en'=> 'CATEGORY AND TAG SETTINGS','tr'=> "KATEGORİ VE ETİKET AYARLARI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_waybill_settings', 'text'=> ['en'=> 'INVOICE/WAYBILL SETTINGS','tr'=> "FATURA/İRSALİYE AYARLARI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'name_and_surname', 'text'=> ['en'=> 'NAME AND SURNAME','tr'=> "AD VE SOYAD"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'mobile_number', 'text'=> ['en'=> 'MOBILE NUMBER','tr'=> "CEP TELEFONU NUMARASI"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'only_view', 'text'=> ['en'=> 'ONLY VIEW','tr'=> "SADECE GÖRÜNTÜLEME"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'full_access', 'text'=> ['en'=> 'FULL ACCESS','tr'=> "TAM ERİŞİM"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'edit_user', 'text'=> ['en'=> 'EDIT USER','tr'=> "KULLANICIYI DÜZENLE"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_invite', 'text'=> ['en'=> 'NEW INVITE','tr'=> "YENİ DAVET"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'user_permissions', 'text'=> ['en'=> 'USER PERMISSIONS','tr'=> "KULLANICI İZİNLERİ"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invite_user', 'text'=> ['en'=> 'INVITE USER','tr'=> "KULLANICIYI DAVET ET"]]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'update_password', 'text'=> ['en'=> 'UPDATE PASSWORD','tr'=> 'ŞİFREYİ GÜNCELLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'old_password', 'text'=> ['en'=> 'OLD PASSWORD','tr'=> 'ESKİ ŞİFRE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_password', 'text'=> ['en'=> 'NEW PASSWORD','tr'=> 'YENİ ŞİFRE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_password_confirmation', 'text'=> ['en'=> 'NEW PASSWORD CONFIRMATION','tr'=> 'YENİ ŞİFRE DOĞRULAMASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'widget_name', 'text'=> ['en'=> 'WIDGET NAME','tr'=> 'BİLEŞEN ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'app_settings_manager', 'text'=> ['en'=> 'APP SETTINGS MANAGER','tr'=> 'UYGULAMA AYARLARI YÖNETİCİSİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'upload_product_image', 'text'=> ['en'=> 'UPLOAD PRODUCT IMAGE','tr'=> 'ÜRÜN RESMİ YÜKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_units', 'text'=> ['en'=> 'STOCK UNITS','tr'=> 'STOK BİRİMLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'reset_password', 'text'=> ['en'=> 'RESET PASSWORD','tr'=> 'ŞİFREYİ SIFIRLA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'send_password_reset_link', 'text'=> ['en'=> 'SEND PASSWORD RESET LINK','tr'=> 'ŞİFRE SIFIRLAMA LİNKİNİ GÖNDER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'confirm_password', 'text'=> ['en'=> 'CONFIRM PASSWORD','tr'=> 'ŞİFREYİ DOĞRULA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sign_in', 'text'=> ['en'=> 'SIGN IN','tr'=> 'GİRİŞ YAP']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'enter_your_password', 'text'=> ['en'=> 'ENTER YOUR PASSWORD','tr'=> 'ŞİFRENİZİ GİRİN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'forgot_password', 'text'=> ['en'=> 'FORGOT PASSWORD','tr'=> 'ŞİFRENİZİ Mİ UNUTTUNUZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stay_signed_in', 'text'=> ['en'=> 'STAY SIGNED IN','tr'=> 'OTURUMUMU AÇIK TUT']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'create_account', 'text'=> ['en'=> 'CREATE ACCOUNT','tr'=> 'HESAP OLUŞTUR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'email_confirmation_is_required', 'text'=> ['en'=> 'E-MAIL CONFIRMATIN IS REQUIRED','tr'=> 'E-POSTA DOĞRULAMASI GEREKLİDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'resend_confirmation_link', 'text'=> ['en'=> 'RESEND CONFIRMATION LINK','tr'=> 'BAĞLANTIYI TEKRAR GÖNDER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'commercial_title', 'text'=> ['en'=> 'COMMERCIAL TITLE','tr'=> 'TİCARİ ÜNVAN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'do_not_forget_your_password', 'text'=> ['en'=> 'DO NOT FORGET YOUR PASSWORD','tr'=> 'ŞİFRENİZİ UNUTMAYIN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'password_confirmation', 'text'=> ['en'=> 'PASSWORD CONFIRMATION','tr'=> 'ŞİFRE DOĞRULAMA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'registration_is_free', 'text'=> ['en'=> 'REGISTRATION IS FREE','tr'=> 'KAYIT ÜCRETSİZDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'share_language', 'text'=> ['en'=> 'SHARE LANGUAGE','tr'=> 'PAYLAŞIM DİLİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'contact_address', 'text'=> ['en'=> 'CONTACT ADDRESS','tr'=> 'İLETİŞİM ADRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cheque_promissory_note', 'text'=> ['en'=> 'CHEQUE-PROMISSORY NOTE','tr'=> 'ÇEK-SENET']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'choose_a_safe', 'text'=> ['en'=> 'PLEASE, CHOOSE A SAFE','tr'=> 'LÜTFEN, KASA SEÇİMİ YAPINIZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'promissory_note', 'text'=> ['en'=> 'PROMISSORY NOTE','tr'=> 'SENET']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'document_type', 'text'=> ['en'=> 'DOCUMENT TYPE','tr'=> 'EVRAK TÜRÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'document_number', 'text'=> ['en'=> 'DOCUMENT NUMBER','tr'=> 'EVRAK NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'bank_cheque', 'text'=> ['en'=> 'BANK CHEQUE','tr'=> 'BANKA ÇEKİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'customer_cheque', 'text'=> ['en'=> 'CUSTOMER CHEQUE','tr'=> 'MÜŞTERİ ÇEKİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'it_can_be_done', 'text'=> ['en'=> 'IT CAN BE DONE','tr'=> 'YAPILABİLİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'it_can_not_be_done', 'text'=> ['en'=> 'IT CAN NOT BE DONE','tr'=> 'YAPILMASIN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'page_not_found', 'text'=> ['en'=> 'PAGE NOT FOUND','tr'=> 'SAYFA BULUNAMADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'something_went_wrong', 'text'=> ['en'=> 'OOOOPS, SOMETHING WENT WRONG','tr'=> 'BİR ŞEYLER YANLIŞ GİTTİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'a_technical_error', 'text'=> ['en'=> 'You have experienced a technical error. We apologize','tr'=> 'Teknik bir hata yaşadınız. Özür dileriz']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'a_technical_error', 'text'=> ['en'=> 'You have experienced a technical error. We apologize','tr'=> 'Teknik bir hata yaşadınız. Özür dileriz']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'correct_this_issue', 'text'=> ['en'=> 'We are working hard to correct this issue. Please wait a few moments and try your search again.','tr'=> 'Bu sorunu düzeltmek için çok çalışıyoruz. Lütfen birkaç dakika bekleyin ve aramanızı tekrar deneyin.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'maintenance_mode', 'text'=> ['en'=> 'MAINTENANCE MODE','tr'=> 'BAKIM MODU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'last_account_activity', 'text'=> ['en'=> 'LAST ACCOUNT ACTIVITY','tr'=> 'SON HESAP AKTİVİTELERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'web_application', 'text'=> ['en'=> 'WEB APPLICATION','tr'=> 'WEB UYGULAMASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'download_progress', 'text'=> ['en'=> 'DOWNLOAD PROGRESS','tr'=> 'İLERLEMEYİ İNDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'mins_ago', 'text'=> ['en'=> 'MINS AGO','tr'=> 'DAKİKA ÖNCE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'full_screen', 'text'=> ['en'=> 'FULL SCREEN','tr'=> 'TAM EKRAN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'my_profile', 'text'=> ['en'=> 'MY PROFILE','tr'=> 'PROFİLİM']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'do_not_use_menu_item', 'text'=> ['en'=> 'DO NOT USE MENU ITEM','tr'=> 'MENÜ ÖĞESİNİ KULLANMA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_follow_link_for_email_confirmation', 'text'=> ['en'=> 'Please follow link for email confirmation and password setup.','tr'=> 'Lütfen e-posta onayı ve şifre kurulumu için linki takip edin.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'automatically_generated_email', 'text'=> ['en'=> 'This is an automatically generated email.','tr'=> 'Bu otomatik olarak oluşturulmuş bir e-postadır.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_list', 'text'=> ['en'=> 'COMPANY LIST','tr'=> 'ŞİRKET LİSTESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_informations', 'text'=> ['en'=> 'ACCOUNT INFORMATIONS','tr'=> 'HESAP BİLGİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'moduler_list', 'text'=> ['en'=> 'MODULER LIST','tr'=> 'MODÜLLER LİSTESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'modul_name', 'text'=> ['en'=> 'MODUL NAME','tr'=> 'MODÜL ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'language_description_list', 'text'=> ['en'=> 'LANGUAGE DESCRIPTION LIST','tr'=> 'DİL AÇIKLAMA LİSTESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_record_for_this_language', 'text'=> ['en'=> 'NO RECORD FOR THIS LANGUAGE','tr'=> 'BU DİL İÇİN KAYIT YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_data_added', 'text'=> ['en'=> 'NO DATA ADDED','tr'=> 'EKLENMİŞ DATA YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'my_data', 'text'=> ['en'=> 'MY DATA','tr'=> 'VERİLERİM']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_route', 'text'=> ['en'=> 'NEW ROUTE','tr'=> 'YENİ ROTA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'expand_all', 'text'=> ['en'=> 'EXPAND ALL','tr'=> 'HEPSİNİ GENİŞLET']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'collapse_all', 'text'=> ['en'=> 'COLLAPSE ALL','tr'=> 'HEPSİNİ DARALT']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'admin_menu', 'text'=> ['en'=> 'ADMIN MENU','tr'=> 'YÖNETİCİ MENÜSÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'owner_and_user_menu', 'text'=> ['en'=> 'OWNER & USER MENU','tr'=> 'HESAP SAHİBİ VE KULLANICI MENÜSÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'route_name_or_url', 'text'=> ['en'=> 'ROUTE NAME OR URL','tr'=> 'ROTA ADI YA DA URL ADRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'example_sales_orders', 'text'=> ['en'=> '(ex:/sales_orders)','tr'=> '(örneğin:/satis_siparisleri)']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'select_top_menu', 'text'=> ['en'=> 'SELECT TOP MENU','tr'=> 'ÜST MENÜ SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'do_not_select', 'text'=> ['en'=> 'DO NOT SELECT','tr'=> 'SEÇİM YAPMA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_writer_name_is_required', 'text'=> ['en'=> 'THE WRITER NAME IS REQUIRED','tr'=> 'YAZAR ADI GEREKLİDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_writer_name_must_be_less_than_that_characters', 'text'=> ['en'=> 'THE WRITER NAME MUST BE LESS THAN 80 CHARACTERS','tr'=> 'YAZAR ADI 80 KARAKTERDEN AZ OLMALIDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_producer_name_is_required', 'text'=> ['en'=> 'THE PRODUCER NAME IS REQUIRED','tr'=> 'ÜRETİCİ ADI GEREKLİDİR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_producer_name_must_be_less_than_that_characters', 'text'=> ['en'=> 'THE PRODUCER NAME MUST BE LESS THAN 80 CHARACTERS','tr'=> 'ÜRETİCİ ADI 80 KARAKTERDEN AZ OLMALIDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_new_admin_route', 'text'=> ['en'=> 'ADD NEW ADMIN ROUTE','tr'=> 'YENİ ADMİN ROTASI EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_admin_route', 'text'=> ['en'=> 'NEW ADMIN ROUTE','tr'=> 'YENİ ADMİN ROTASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'add_new_owner_route', 'text'=> ['en'=> 'ADD NEW OWNER ROUTE','tr'=> 'YENİ HESAP SAHİBİ ROTASI EKLE']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_owner_route', 'text'=> ['en'=> 'NEW OWNER ROUTE','tr'=> 'YENİ HESAP SAHİBİ ROTASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_menu', 'text'=> ['en'=> 'ACCOUNT MENU','tr'=> 'HESAP MENÜSÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'admin_dashboard', 'text'=> ['en'=> 'ADMIN DASHBOARD','tr'=> 'YÖNETİCİ GÖSTERGE PANELİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'you_are_logged_in_as_admin', 'text'=> ['en'=> 'YOU ARE LOGGED IN AS ADMIN','tr'=> 'YÖNETİCİ OLARAK GİRİŞ YAPTINIZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_accounts', 'text'=> ['en'=> 'COMPANY ACCOUNTS','tr'=> 'ŞİRKET HESAPLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'account_users', 'text'=> ['en'=> 'ACCOUNT USERS','tr'=> 'HESAP KULLANICILARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'return_summary_informations', 'text'=> ['en'=> 'RETURN SUMMARY INFORMATIONS','tr'=> 'ÖZET BİLGİLERİ GERİ DÖNDÜR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cheque_collection', 'text'=> ['en'=> 'CHEQUE COLLECTION','tr'=> 'ÇEK TAHSİLATI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'request_amount', 'text'=> ['en'=> 'REQUEST AMOUNT','tr'=> 'TALEP TUTARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'effective_date', 'text'=> ['en'=> 'EFFECTIVE DATE','tr'=> 'EFEKTİF TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'provision_for_tl', 'text'=> ['en'=> 'PROVISION FOR TL','tr'=> 'TL KARŞILIĞI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'tracking_number', 'text'=> ['en'=> 'TRACKING NUMBER','tr'=> 'TAKİP NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'client_id', 'text'=> ['en'=> 'CLIENT ID','tr'=> 'MÜŞTERİ NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'client_secret', 'text'=> ['en'=> 'CLIENT SECRET','tr'=> 'MÜŞTERİ ŞİFRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_id', 'text'=> ['en'=> 'COMPANY ID','tr'=> 'ŞİRKET NUMARASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'model_header', 'text'=> ['en'=> 'MODEL HEADER','tr'=> 'MODEL BAŞLIĞI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'expense_status', 'text'=> ['en'=> 'EXPENSE STATUS','tr'=> 'GİDER DURUMU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'choose_account', 'text'=> ['en'=> 'CHOOSE ACCOUNT','tr'=> 'HESAP SEÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'turkish_lira', 'text'=> ['en'=> 'TRY - TURKISH LIRA','tr'=> 'TRY - TÜRK LİRASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure', 'text'=> ['en'=> 'ARE YOU SURE?','tr'=> 'EMİN MİSİNİZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_sales_offer', 'text'=> ['en'=> 'ARE YOU SURE DELETE SALES OFFER ?','tr'=> 'SATIŞ TEKLİFİNİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_purchase_request', 'text'=> ['en'=> 'ARE YOU SURE DELETE PURCHASE REQUEST?','tr'=> 'SATIN ALMA TALEBİNİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_product', 'text'=> ['en'=> 'ARE YOU SURE DELETE PRODUCT ?','tr'=> 'ÜRÜNÜ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_stock_receipt', 'text'=> ['en'=> 'ARE YOU SURE DELETE STOCK RECEIPT ?','tr'=> 'STOK FİŞİNİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_purchase_order', 'text'=> ['en'=> 'ARE YOU SURE DELETE PURCHASE ORDER?','tr'=> 'SATIN ALMA FİŞİNİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_sales_offer', 'text'=> ['en'=> 'ARE YOU SURE DELETE SALES OFFER','tr'=> 'SATIŞ TEKLİFİNİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_company', 'text'=> ['en'=> 'ARE YOU SURE DELETE COMPANY ?','tr'=> 'ŞİRKETİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_delete_cheque', 'text'=> ['en'=> 'ARE YOU SURE DELETE CHEQUE ?','tr'=> 'ÇEKİ SİLMEK Mİ İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'unit_price', 'text'=> ['en'=> 'UNIT PRICE','tr'=> 'BİRİM FİYATI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'word_and_number', 'text'=> ['en'=> 'UNIT PRICE','tr'=> 'BİRİM FİYATI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 't_office_no', 'text'=> ['en'=> 'T.OFFICE NO','tr'=> 'V.D NO']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sending_mail_to_the_customer', 'text'=> ['en'=> 'ARE YOU SENDING MAIL TO THE CUSTOMER?','tr'=> 'MÜŞTERİYE MAİL GÖNDERİLSİN Mİ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'select_the_product_products_being_shipped', 'text'=> ['en'=> 'SELECT THE PRODUCT/PRODUCTS BEING SHIPPED','tr'=> 'SEVKİYATI YAPILAN ÜRÜN/ÜRÜNLERİ SEÇİN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'seven_days', 'text'=> ['en'=> '7 DAYS','tr'=> '7 GÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'fourteen_days', 'text'=> ['en'=> '14 DAYS','tr'=> '14 GÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'thirty_days', 'text'=> ['en'=> '30 DAYS','tr'=> '30 GÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sixty_days', 'text'=> ['en'=> '60 DAYS','tr'=> '60 GÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'shipment_information', 'text'=> ['en'=> 'SHIPMENT INFORMATION','tr'=> 'SEVKİYAT BİLGİSİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'shipping_company', 'text'=> ['en'=> 'SHIPPING COMPANY','tr'=> 'NAKLİYE ŞİRKETİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'if_there_is', 'text'=> ['en'=> 'IF THERE IS','tr'=> 'VARSA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'customer_email', 'text'=> ['en'=> 'CUSTOMER E-MAIL','tr'=> 'MÜŞTERİ E-POSTA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_offer_details_by_downloading_the_summary', 'text'=> ['en'=> 'HELLO, YOU CAN REVIEW THE SALES OFFER DETAILS BY DOWNLOADING THE SUMMARY. ','tr'=> 'MERHABA, SATIŞ TEKLİFİ DETAYLARINIZ EKTEDİR, İNDİREREK İNCELEYEBİLİRSİNİZ. ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_order_details_by_downloading_the_summary', 'text'=> ['en'=> 'HELLO, YOU CAN REVIEW THE SALES ORDER DETAILS BY DOWNLOADING THE SUMMARY. ','tr'=> 'MERHABA, SATIŞ SİPARİŞİ DETAYLARINIZ EKTEDİR, İNDİREREK İNCELEYEBİLİRSİNİZ. ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'purchase_request_details_by_downloading_the_summary', 'text'=> ['en'=> 'HELLO, YOU CAN REVIEW THE PURCHASE REQUEST DETAILS BY DOWNLOADING THE SUMMARY. ','tr'=> 'MERHABA, SATIN ALMA TALEBİ DETAYLARINIZ EKTEDİR, İNDİREREK İNCELEYEBİLİRSİNİZ. ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'you_do_not_have_permission_to_visit_this_page', 'text'=> ['en'=> 'YOU DO NOT HAVE PERMISSION TO VISIT THIS PAGE','tr'=> 'BU SAYFAYI ZİYARET ETME İZNİNİZ YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_transaction', 'text'=> ['en'=> 'NEW TRANSACTION','tr'=> 'YENİ İŞLEM']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_row', 'text'=> ['en'=> 'NEW ROW','tr'=> 'YENİ SATIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'processed_invoice', 'text'=> ['en'=> 'PROCESSED INVOICE','tr'=> 'İŞLENMİŞ FATURA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'due_date', 'text'=> ['en'=> 'DUE DATE','tr'=> 'VADE TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'termin_date', 'text'=> ['en'=> 'TERMIN DATE','tr'=> 'TERMİN TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'back_to_login', 'text'=> ['en'=> 'BACK TO LOGIN','tr'=> 'GİRİŞE GERİ DÖN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'you_have_been_registered_to', 'text'=> ['en'=> 'You have been registered to ','tr'=> 'Başarıyla kayıt oldunuz ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'confirmation_code', 'text'=> ['en'=> 'CONFIRMATION CODE','tr'=> 'DOĞRULAMA KODU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_data_available_in_table', 'text'=> ['en'=> 'NO DATA AVAIBLE IN TABLE','tr'=> 'TABLODA HERHANGİ BİR VERİ MEVCUT DEĞİL']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'info_empty', 'text'=> ['en'=> 'INFO EMPTY','tr'=> 'KAYIT YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'loading', 'text'=> ['en'=> 'LOADING...','tr'=> 'YÜKLENİYOR...']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'processing', 'text'=> ['en'=> 'PROCESSING...','tr'=> 'İŞLENİYOR...']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_matching_found', 'text'=> ['en'=> 'NO MATCHING RECORDS FOUND','tr'=> 'EŞLEŞEN KAYIT BULUNAMADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'first', 'text'=> ['en'=> 'FIRST','tr'=> 'İLK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'last', 'text'=> ['en'=> 'LAST','tr'=> 'SON']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'next', 'text'=> ['en'=> 'NEXT','tr'=> 'SONRAKİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'previous', 'text'=> ['en'=> 'PREVIOUS','tr'=> 'ÖNCEKİ']]);

        LanguageLine::create(['group'=> 'sentence', 'key'=> 'filtered_from', 'text'=> ['en'=> 'FILTERED FROM _MAX_ TOTAL ENTRIES','tr'=> '_MAX_ KAYIT İÇERİSİNDEN BULUNAN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'showing_record', 'text'=> ['en'=> 'SHOWING _START_ TO _END_ TO _TOTAL_ ENTRIES','tr'=> '_TOTAL_ KAYITTAN _START_ - _END_ ARASINDAKİ KAYITLAR GÖSTERİLİYOR']]);

        LanguageLine::create(['group'=> 'sentence', 'key'=> 'mail_was_send', 'text'=> ['en'=> 'MAIL WAS SEND','tr'=> 'MAİL GÖNDERİLDİ.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'mail_wasnot_send', 'text'=> ['en'=> 'MAIL WAS NOT SEND','tr'=> 'MAİL GÖNDERİLEMEDİ.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'offer_date', 'text'=> ['en'=> 'OFFER DATE','tr'=> 'TALEP TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_offer', 'text'=> ['en'=> 'NEW OFFER','tr'=> 'YENİ TEKLİF']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'offer_amount', 'text'=> ['en'=> 'OFFER AMOUNT','tr'=> 'TEKLİF TUTARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'termin_date', 'text'=> ['en'=> 'TERMIN DATE','tr'=> 'TERMİN TARİHİ']]);

        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_products_in_stock', 'text'=> ['en'=> 'THERE IS NO PRODUCT IN STOCK','tr'=> 'STOKTA ÜRÜN BULUNAMADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_code', 'text'=> ['en'=> 'PRODUCT CODE','tr'=> 'ÜRÜN KODU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_cost', 'text'=> ['en'=> 'STOCK CODE','tr'=> 'STOK MALİYETİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_value', 'text'=> ['en'=> 'SALES VALUE','tr'=> 'SATIŞ DEĞERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_profit', 'text'=> ['en'=> 'SALES PROFIT','tr'=> 'SATIŞ KARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_list_in_stock', 'text'=> ['en'=> 'PRODUCT LIST IN STOCK','tr'=> 'STOKTAKİ ÜRÜNLER LİSTESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'potential_gain', 'text'=> ['en'=> 'POTENTIAL GAIN','tr'=> 'POTANSİYEL KAZANÇ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'estimated_purchase_price', 'text'=> ['en'=> 'ESTIMATED PURCHASE PRICE','tr'=> 'TAHMİNİ ALIŞ DEĞERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'estimated_sales_price', 'text'=> ['en'=> 'ESTIMATED SALES PRICE','tr'=> 'TAHMİNİ SATIŞ DEĞERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'stock_value', 'text'=> ['en'=> 'STOCK VALUE','tr'=> 'STOK DEĞERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_purchase_potential_gain', 'text'=> ['en'=> 'Estimated Sales Value, Estimated Buy Value, and Potential Gain are not included in the calculation of non-STO products. Calculations are based on the Purchase Price and the Sales Price specified on the product pages.','tr'=> 'Tahmini Satış Değeri, Tahmini Alış Değeri ve Potansiyel Kazanç hesaplamalarına stokta olmayan ürünler dahil edilmez. Hesaplamalar ürün sayfalarında belirtilen Alış Fiyatı ve Satış Fiyatı üzerinden yapılır.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'all_your_informations_saved', 'text'=> ['en'=> 'ALL YOUR INFORMATIONS SAVED','tr'=> 'TÜM BİLGİLERİNİZ KAYDEDİLDİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_check_form_again', 'text'=> ['en'=> 'PLEASE, CHECK FORM AGAIN','tr'=> 'LÜTFEN FORMU TEKRARDAN KONTROL EDİNİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_invoice', 'text'=> ['en'=> 'SALES INVOICE','tr'=> 'SATIŞ FATURASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_invoices', 'text'=> ['en'=> 'SALES INVOICES','tr'=> 'SATIŞ FATURALARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'calculated_vat', 'text'=> ['en'=> 'CALCULATED VAT','tr'=> 'HESAPLANAN KDV']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'reduced_vat', 'text'=> ['en'=> 'REDUCED VAT','tr'=> 'İNDİRİLECEK KDV']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'clear_vat', 'text'=> ['en'=> 'CLEAR VAT','tr'=> 'NET KDV']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'vat_reports_per_calendar_month', 'text'=> ['en'=> 'VAT REPORTS PER CALENDAR MONTH','tr'=> 'TAKVİM AYI BAŞINA KDV RAPORLARI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_and_expenses_vat_table', 'text'=> ['en'=> 'SALES AND EXPENSES VAT TABLE','tr'=> 'SATIŞLAR VE GİDERLER KDV TABLOSU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'any_sales_invoice_was_not_created', 'text'=> ['en'=> 'ANY SALES INVOICE WAS NOT CREATED','tr'=> 'HERHANGİ BİR SATIŞ FATURASI OLUŞTURULMAMIŞTIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'payment_history', 'text'=> ['en'=> 'PAYMENT HISTORY','tr'=> 'ÖDEME GEÇMİŞİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'due_payments', 'text'=> ['en'=> 'DUE PAYMENTS','tr'=> 'VADESİ GELEN ÖDEMELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'due_collections', 'text'=> ['en'=> 'DUE COLLECTIONS','tr'=> 'VADESİ GELEN TAHSİLATLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'safe_and_accounts', 'text'=> ['en'=> 'SAFE AND ACCOUNTS','tr'=> 'KASA VE HESAPLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_record', 'text'=> ['en'=> 'NO RECORD','tr'=> 'KAYIT YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'offer_request', 'text'=> ['en'=> 'OFFER REQUEST','tr'=> 'TEKLİF TALEBİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'good_work', 'text'=> ['en'=> 'GOOD WORK','tr'=> 'İYİ ÇALIŞMALAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'received_check', 'text'=> ['en'=> 'RECEIVED CHECK','tr'=> 'ALINAN ÇEK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'given_check', 'text'=> ['en'=> 'GIVEN CHECK','tr'=> 'VERİLEN ÇEK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'send_transport_informations', 'text'=> ['en'=> 'SEND TRANSPORT INFORMATIONS','tr'=> 'SEVKİYAT BİLGİLERİNİ GÖNDER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'send_to_production', 'text'=> ['en'=> 'SEND TO PRODUCTION','tr'=> 'ÜRETİME GÖNDER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_proccess_completed', 'text'=> ['en'=> 'THE PROCCESS COMPLETED.','tr'=> 'İŞLEM TAMAMLANDI.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'it_is_printing', 'text'=> ['en'=> 'IT IS PRINTING...','tr'=> 'YAZDIRILIYOR...']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delete_invoice_record', 'text'=> ['en'=> 'DELETE INVOICE RECORD','tr'=> 'FATURA KAYDINI SİL']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_order_sent_to_production', 'text'=> ['en'=> 'THE ORDER SENT TO PRODUCTION','tr'=> 'ÜRETİM SİPARİŞE GÖNDERİLDİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'what_do_you_want_to_do', 'text'=> ['en'=> 'WHAT DO YOU WANT TO DO?','tr'=> 'NE YAPMAK İSTİYORSUNUZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'you_have_removed_the_selected_waybill', 'text'=> ['en'=> 'YOU HAVE REMOVED THE SELECTED WAYBILL','tr'=> 'SEÇİLEN İRSALİYEYİ KALDIRDINIZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_transaction_approved', 'text'=> ['en'=> 'THE TRANSACTION APPROVED.','tr'=> 'İŞLEM ONAYLANDI.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'production_approval', 'text'=> ['en'=> 'PRODUCTION APPROVAL','tr'=> 'ÜRETİM ONAYI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'this_order_will_be_included_in_the_production_planning', 'text'=> ['en'=> 'THIS ORDER WILL BE INCLUDED IN THE PRODUCTION PLANNING.','tr'=> 'BU SİPARİŞ ÜRETİM PLANLANMASINA DAHİL EDİLECEKTİR.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_wait', 'text'=> ['en'=> 'PLEASE, WAIT','tr'=> 'LÜTFEN BEKLEYİNİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_order_was_successfully_submitted_to_the_production_planning_department', 'text'=> ['en'=> 'THE ORDER WAS SUCCESSFULLY SUBMITTED TO THE PRODUCTION PLANNING DEPARTMENT','tr'=> 'SİPARİŞ BAŞARIYLA ÜRETİM PLANLAMA BÖLÜMÜNE GÖNDERİLDİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_transaction_is_faulty', 'text'=> ['en'=> 'THE TRANSACTION IS FAULTY.','tr'=> 'İŞLEM HATALI.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_try_again_later', 'text'=> ['en'=> 'PLEASE TRY AGAIN LATER.','tr'=> 'LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'if_you_want_to_send_cargo_information_by_email', 'text'=> ['en'=> 'IF YOU WANT TO SEND CARGO INFORMATION BY E-MAIL, PLEASE DO NOT LEAVE YOUR E-MAIL ADDRESS BLANK','tr'=> 'KARGO BİLGİSİNİ MAİL OLARAK GÖNDERMEK İSTİYORSANIZ, LÜTFEN E-POSTA ADRESİNİ BOŞ BIRAKMAYINIZ.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_enter_full_transport_informations', 'text'=> ['en'=> 'PLEASE, ENTER FULL TRANSPORT INFORMATIONS.','tr'=> 'LÜTFEN SEVKİYAT BİLGİLERİNİ EKSİKSİZ GİRİNİZ.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'confirm_billing_deletion', 'text'=> ['en'=> 'CONFIRM BILLING DELETION','tr'=> 'FATURA SİLME İŞLEMİNİ ONAYLA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'are_you_sure_you_want_to_delete_the_bill', 'text'=> ['en'=> 'ARE YOU SURE YOU WANT TO DELETE THE BILL','tr'=> 'FATURAYI SİLMEK İSTEDİĞİNİZDEN EMİN MİSİNİZ?']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'you_are_about_to_delete_the_bill_from_this_order', 'text'=> ['en'=> 'YOU ARE ABOUT TO DELETE THE BILL FROM THIS ORDER','tr'=> 'BU SİPARİŞTEN FATURAYI SİLMEK ÜZERESİNİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_invoice_deleted_successfully', 'text'=> ['en'=> 'THE INVOICE DELETED SUCCESSFULLY','tr'=> 'FATURA BAŞARIYLA SİLİNDİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_invoice_could_not_be_deleted', 'text'=> ['en'=> 'THE INVOICE COULD NOT BE DELETED','tr'=> 'FATURA SİLİNEMEDİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_contact_your_system_administrator', 'text'=> ['en'=> 'PLEASE, CONTACT YOUR SYSTEM ADMINISTRATOR','tr'=> 'LÜTFEN SİSTEM YÖNETİCİNİZ İLE GÖRÜŞÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'your_email_address_must_be_in_the_format', 'text'=> ['en'=> 'YOUR E-MAIL ADDRESS MUT BE IN THE FORMAT OF name@domain.com','tr'=> 'E-POSTA ADRESİNİZ isim@alanadi.com BİÇİMİNDE OLMALIDIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_specify_your_first_name', 'text'=> ['en'=> 'PLEASE, SPECIFY YOUR FIRST NAME','tr'=> 'LÜTFEN ADINIZI BELİRTİNİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_specify_your_last_name', 'text'=> ['en'=> 'PLEASE, SPECIFY YOUR LAST NAME','tr'=> 'LÜTFEN SOYADINIZI BELİRTİNİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'we_need_your_email_address_to_contact_you', 'text'=> ['en'=> 'WE NEED YOUR E-MAIL ADDRESS TO CONTACT YOU','tr'=> 'SİZİNLE İLETİŞİM KURMAK İÇİN E-POSTA ADRESİNİZE İHTİYACIMIZ VAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_fill_required_fields', 'text'=> ['en'=> 'PLEASE, FILL REQUIRED FIELDS','tr'=> 'LÜTFEN, ZORUNLU ALANLARI DOLDURUNUZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_company', 'text'=> ['en'=> 'NEW COMPANY','tr'=> 'YENİ FİRMA']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_form', 'text'=> ['en'=> 'COMPANY FORM','tr'=> 'FİRMA FORMU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'new_product', 'text'=> ['en'=> 'NEW PRODUCT','tr'=> 'YENİ ÜRÜN']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'product_form', 'text'=> ['en'=> 'PRODUCT FORM','tr'=> 'ÜRÜN FORMU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'day_month_year_format', 'text'=> ['en'=> 'DD/MM/YYYY','tr'=> 'GG/AA/YYYY']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_categories', 'text'=> ['en'=> 'INVOICE CATEGORIES','tr'=> 'FATURA KATEGORİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'customer_categories', 'text'=> ['en'=> 'CUSTOMER CATEGORIES','tr'=> 'MÜŞTERİ KATEGORİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'supplier_categories', 'text'=> ['en'=> 'SUPPLIER CATEGORIES','tr'=> 'TEDARİKÇİ KATEGORİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'service_and_product_categories', 'text'=> ['en'=> 'SERVICE / PRODUCT CATEGORIES','tr'=> 'HİZMET / ÜRÜN KATEGORİLERİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'sales_reports_table', 'text'=> ['en'=> 'SALES REPORTS TABLE','tr'=> 'SATIŞ RAPORLARI TABLOSU']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'company_name', 'text'=> ['en'=> 'COMPANY NAME','tr'=> 'ŞİRKET ADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'overdue_collections', 'text'=> ['en'=> 'OVERDUE COLLECTIONS','tr'=> 'VADESİ GEÇEN TAHSİLATLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'overdue_payments', 'text'=> ['en'=> 'OVERDUE PAYMENTS','tr'=> 'VADESİ GEÇEN ÖDEMELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_collection', 'text'=> ['en'=> 'TOTAL COLLECTION','tr'=> 'TOPLAM TAHSİLAT']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_collections', 'text'=> ['en'=> 'TOTAL COLLECTIONS','tr'=> 'TOPLAM TAHSİLATLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_payment', 'text'=> ['en'=> 'TOTAL PAYMENT','tr'=> 'TOPLAM ÖDEME']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'total_payments', 'text'=> ['en'=> 'TOTAL PAYMENTS','tr'=> 'TOPLAM ÖDEMELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'collection_date', 'text'=> ['en'=> 'COLLECTION DATE','tr'=> 'TAHSİLAT TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_and_cheque_date', 'text'=> ['en'=> 'INVOICE / CHEQUE DATE','tr'=> 'FATURA / ÇEK TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'customer_and_supplier', 'text'=> ['en'=> 'CUSTOMER / SUPPLIER','tr'=> 'MÜŞTERİ / TEDARİKÇİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'invoice_and_cheque', 'text'=> ['en'=> 'INVOICE / CHEQUE','tr'=> 'FATURA / ÇEK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'not_specified', 'text'=> ['en'=> 'NOT SPECIFIED','tr'=> 'BELİRTİLMEDİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'payment_date', 'text'=> ['en'=> 'PAYMENT DATE','tr'=> 'ÖDEME TARİHİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'please_enter_a_valid_email_address', 'text'=> ['en'=> 'PLEASE ENTER A VALID E-MAIL ADDRESS','tr'=> 'LÜTFEN GEÇERLİ BİR E-POSTA ADRESİ GİRİNİZ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'the_cheque_purchase_transaction_happened', 'text'=> ['en'=> 'THE CHEQUE PURCHASE TRANSACTION HAPPENED','tr'=> 'ÇEK ALIM İŞLEMİ GERÇEKLEŞTİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'summary_information', 'text'=> ['en'=> 'SUMMARY INFORMATION','tr'=> 'ÖZET BİLGİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'current_account_extract', 'text'=> ['en'=> 'CURRENT ACCOUNT EXTRACT','tr'=> 'CARİ HESAP EKSTRESİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'there_is_no_account_activity', 'text'=> ['en'=> 'THERE IS NO ACCOUNT ACTIVITY','tr'=> 'HESAP FAALİYETİ BULUNMAMAKTADIR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'default_validity_day', 'text'=> ['en'=> 'DEFAULT VALIDITY DAY','tr'=> 'VARSAYILAN GEÇERLİLİK GÜNÜ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'show_logo', 'text'=> ['en'=> 'SHOW LOGO','tr'=> 'LOGOYU GÖSTER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'introduction_text', 'text'=> ['en'=> 'INTRODUCTION TEXT','tr'=> 'GİRİŞ METNİ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'bottom_note', 'text'=> ['en'=> 'BOTTOM NOTE','tr'=> 'ALT NOT']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'if_you_do_not_want_to_use_the_cover_page', 'text'=> ['en'=> 'IF YOU DO NOT WANT TO USE THE COVER PAGE, YOU SHALL BE EMPTY.','tr'=> 'KAPAK SAYFASINI KULLANMAK İSTEMİYORSANIZ BOŞ BIRAKINIZ.']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'cover_page', 'text'=> ['en'=> 'COVER PAGE','tr'=> 'KAPAK SAYFASI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_records_found', 'text'=> ['en'=> 'NO RECORDS FOUND','tr'=> 'KAYIT BULUNAMADI']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delayed_collections', 'text'=> ['en'=> 'DELAYED COLLECTIONS','tr'=> 'GECİKMİŞ TAHSİLATLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'unplannıng_collections', 'text'=> ['en'=> 'UNPLANNING COLLECTIONS','tr'=> 'GÜNÜ GELMEMİŞ TAHSİLATLAR']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delayed_payments', 'text'=> ['en'=> 'DELAYED PAYMENTS','tr'=> 'GECİKMİŞ ÖDEMELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'unplannıng_payments', 'text'=> ['en'=> 'UNPLANNING PAYMENTS','tr'=> 'GÜNÜ GELMEMİŞ ÖDEMELER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delayed_order', 'text'=> ['en'=> 'DELAYED ORDER','tr'=> 'GECİKMİŞ SİPARİŞ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'future_order', 'text'=> ['en'=> 'FUTURE ORDER','tr'=> 'GELECEK SİPARİŞ']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delayed_cheque', 'text'=> ['en'=> 'DELAYED CHEQUE','tr'=> 'GECİKMİŞ ÇEK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'future_cheque', 'text'=> ['en'=> 'FUTURE CHEQUE','tr'=> 'GELECEK ÇEK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_collection', 'text'=> ['en'=> 'NO COLLECTION','tr'=> 'TAHSİLAT YOK']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'delayed_expense', 'text'=> ['en'=> 'DELAYED EXPENSE','tr'=> 'GECİKMİŞ GİDER']]);
        LanguageLine::create(['group'=> 'sentence', 'key'=> 'no_payment', 'text'=> ['en'=> 'NO PAYMENT','tr'=> 'ÖDEME YOK']]);


    }
}
