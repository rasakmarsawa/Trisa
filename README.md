# Trisha Project

Trisha is a dual-platform application consisting of a **Mobile** app (Android) and a **Web** admin/cashier dashboard for managing restaurant orders, inventory, cashier accounts, and customer activities.

## Project Structure

```
Mobile/
  ├── app/
  ├── build.gradle
  ├── gradle.properties
  ├── gradlew
  ├── gradlew.bat
  ├── settings.gradle
  └── ...
Web/
  ├── index.php
  ├── login.php
  ├── listBarang.php
  ├── listKasir.php
  ├── listPesanan.php
  ├── listStatus.php
  ├── tambahBarang.php
  ├── tambahKasir.php
  ├── tambahPesanan.php
  ├── detailBarang.php
  ├── detailKasir.php
  ├── detailPelanggan.php
  ├── detailPesanan.php
  ├── topup.php
  ├── ubahBarang.php
  ├── ubahKasir.php
  ├── ubahStatus.php
  ├── assets/
  ├── controller/
  ├── model/
  ├── include/
  └── ...
```

## Features

### Mobile App
- Built for Android (see [Mobile/app/google-services.json](Mobile/app/google-services.json) for Firebase integration).
- Allows customers to place orders, view status, and receive notifications.

### Web Dashboard
- Admin and cashier login ([Web/login.php](Web/login.php)).
- Manage inventory ([Web/listBarang.php](Web/listBarang.php), [Web/tambahBarang.php](Web/tambahBarang.php), [Web/ubahBarang.php](Web/ubahBarang.php)).
- Manage cashier accounts ([Web/listKasir.php](Web/listKasir.php), [Web/tambahKasir.php](Web/tambahKasir.php), [Web/ubahKasir.php](Web/ubahKasir.php)).
- View and process orders ([Web/listPesanan.php](Web/listPesanan.php), [Web/detailPesanan.php](Web/detailPesanan.php)).
- Manage order statuses ([Web/listStatus.php](Web/listStatus.php), [Web/ubahStatus.php](Web/ubahStatus.php)).
- Top-up customer balances ([Web/topup.php](Web/topup.php), [Web/detailPelanggan.php](Web/detailPelanggan.php)).
- Data tables and charts for sales and inventory ([Web/index.php](Web/index.php)).
- Image upload for items ([Web/controller/imageUpload.php](Web/controller/imageUpload.php)).

## Setup

### Mobile
1. Open the `Mobile` folder in Android Studio.
2. Configure Firebase using the provided `google-services.json`.
3. Build and run the app on your device.

### Web
1. Place the `Web` folder on your PHP-enabled web server.
2. Configure database connection in [Web/controller/connection.php](Web/controller/connection.php).
3. Access the dashboard via your browser.

## Dependencies

- **Mobile:** Android SDK, Firebase
- **Web:** PHP 7+, MySQL, Bootstrap, jQuery, DataTables, CKEditor, CropperJS

## License

See individual component licenses and third-party libraries for details.

---
