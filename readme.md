# about this project

## 系統需求
* php 7.3
* composer

## Purpose
鑑於過去舊專案沒有統一的本地端資料庫測試環境，所以將 2019/4/3 之前的資料庫資料做成 migration ，統一管理於本專案。

migrations 資料夾分成兩個
database/migrations 為線上資料庫 gomaji

database/txn_migrations 為線上資料庫 transaction

### 速查表單

|線上資料庫名稱|migration資料夾|連線資訊名稱( config.php 中的設定名稱)|
|---|---|---|
|gomaji|database/migrations|gomaji|
|transaction|database/txn_migrations|transaction|

* ps. 欄位註解裡面有亂碼的地方是原本線上資料庫就這樣了，我只是搬運工，不是我的鍋。

### 執行指令

* gomaji 資料庫 migrate
```
php artisan migrate
```

* transaction 資料庫 migrate
```
php artisan migrate --database='transaction' --path=./database/txn_migrations
```

### Warning

1. 此份 migration 僅供測試使用，不建議部署至正式。
2. 部分時間欄位，nullable ＆ default 為 '0000-00-00' 諸如此類，不推薦這樣使用。
3. 每張表的 id 都各自不同名字，建議未來各表 id 取名 id 即可。
4. 資料庫 transaction 的 ad_receive_invoice 複合 PK 不建立，原因
   1. migrate 時一直噴錯，說重複建立 PK，innodb 不能同時 auto increament 又用複合 key
   2. 這樣的 PK 並沒有效果，反而增加 DB Blocking 機率
   3. index 有 invoice_id 就夠了
5. 資料庫 transaction 的 card_ino & cucard_info 預設值會噴錯，所以取消空字串預設值。
6. 資料庫 transaction 的 coupon & pcode_ppe 表 也有上面（4）的問題。
7. 資料庫 transaction 的 user_purchases_err & user_purchases 也有上面（4）的問題。
8. 資料庫 transaction 表 escape_abroad 欄位 store_order_no 長度 200->191
9. 資料庫 transaction 表 foodie_menu 欄位 pickGroupName & optionsNames 長度 254->191
10. 資料庫 transaction 表 store_finance_sp 欄位 sp_name 長度 254->191
