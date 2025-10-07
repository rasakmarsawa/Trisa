
CREATE TABLE barang (
                id_barang INT AUTO_INCREMENT NOT NULL,
                nama_barang VARCHAR(50) NOT NULL,
                harga INT NOT NULL,
                PRIMARY KEY (id_barang)
);


CREATE TABLE pelanggan (
                id_pelanggan INT AUTO_INCREMENT NOT NULL,
                nama_pelanggan VARCHAR(20) NOT NULL,
                username VARCHAR(20) NOT NULL,
                password VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                no_hp VARCHAR(15) NOT NULL,
                saldo INT NOT NULL,
                PRIMARY KEY (id_pelanggan)
);


CREATE TABLE pesanan (
                tanggal DATE NOT NULL,
                no INT NOT NULL,
                status INT NOT NULL,
                total_harga INT NOT NULL,
                id_pelanggan INT NOT NULL,
                PRIMARY KEY (tanggal, no)
);


CREATE TABLE detail_pesanan (
                tanggal DATE NOT NULL,
                no INT NOT NULL,
                id_barang INT NOT NULL,
                jumlah_barang INT NOT NULL,
                PRIMARY KEY (tanggal, no, id_barang)
);


CREATE TABLE kasir (
                id_kasir INT AUTO_INCREMENT NOT NULL,
                nama_kasir VARCHAR(20) NOT NULL,
                username VARCHAR(20) NOT NULL,
                password VARCHAR(50) NOT NULL,
                admin BOOLEAN NOT NULL,
                PRIMARY KEY (id_kasir)
);


CREATE TABLE status_antrian (
                id VARCHAR(20) NOT NULL,
                status INT NOT NULL,
                timestamp DATETIME NOT NULL,
                id_kasir INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE topup (
                tanggal DATE NOT NULL,
                no INT NOT NULL,
                jumlah_topup INT NOT NULL,
                id_pelanggan INT NOT NULL,
                id_kasir INT NOT NULL,
                PRIMARY KEY (tanggal, no)
);


ALTER TABLE detail_pesanan ADD CONSTRAINT barang_detail_pesanan_fk
FOREIGN KEY (id_barang)
REFERENCES barang (id_barang)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE topup ADD CONSTRAINT pelanggan_topup_fk
FOREIGN KEY (id_pelanggan)
REFERENCES pelanggan (id_pelanggan)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pesanan ADD CONSTRAINT pelanggan_pesanan_fk
FOREIGN KEY (id_pelanggan)
REFERENCES pelanggan (id_pelanggan)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_pesanan ADD CONSTRAINT pesanan_detail_pesanan_fk
FOREIGN KEY (tanggal, no)
REFERENCES pesanan (tanggal, no)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE topup ADD CONSTRAINT kasir_topup_fk
FOREIGN KEY (id_kasir)
REFERENCES kasir (id_kasir)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE status_antrian ADD CONSTRAINT kasir_status_antrian_fk
FOREIGN KEY (id_kasir)
REFERENCES kasir (id_kasir)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
