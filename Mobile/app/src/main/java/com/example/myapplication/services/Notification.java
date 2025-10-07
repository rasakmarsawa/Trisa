package com.example.myapplication.services;

import android.app.Application;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.os.Build;

public class Notification  extends Application {

    public static final String CHANNEL_1_ID = "statusUpdate";
    public static final String CHANNEL_2_ID = "forceLogout";
    public static final String CHANNEL_3_ID = "antrianStatus";

    @Override
    public void onCreate() {
        super.onCreate();

        createNotificationChannel();
    }

    private void createNotificationChannel() {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O){
            NotificationChannel channel1 = new NotificationChannel(
                    CHANNEL_1_ID,
                    "channel 1",
                    NotificationManager.IMPORTANCE_HIGH
            );
            channel1.setDescription("This is channel 1");

            NotificationChannel channel2 = new NotificationChannel(
                    CHANNEL_2_ID,
                    "channel 2",
                    NotificationManager.IMPORTANCE_HIGH
            );
            channel2.setDescription("This is channel 2");

            NotificationChannel channel3 = new NotificationChannel(
                    CHANNEL_3_ID,
                    "channel 3",
                    NotificationManager.IMPORTANCE_HIGH
            );
            channel3.setDescription("Channel untuk status restoran");

            NotificationManager manager = getSystemService((NotificationManager.class));
            manager.createNotificationChannel(channel1);
            manager.createNotificationChannel(channel2);
            manager.createNotificationChannel(channel3);
        }
    }
}
