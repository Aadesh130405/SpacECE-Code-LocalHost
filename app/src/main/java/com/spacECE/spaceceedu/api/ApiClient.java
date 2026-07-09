package com.spacECE.spaceceedu.api;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

//public class ApiClient {
//
//    private static final String BASE_URL = "https://hustle-7c68d043.mileswebhosting.com/";
//private static final String BASE_URL = "https://spaceceindiafoundation.infinityfreeapp.com/";
//
//    private static Retrofit retrofit = null;
//
//    public static Retrofit getClient() {
//        if (retrofit == null) {
//            retrofit = new Retrofit.Builder()
//                    .baseUrl(BASE_URL)
//                    .addConverterFactory(GsonConverterFactory.create())
//                    .build();
//        }
//        return retrofit;
//    }
//}
public class ApiClient {

    //    private static final String BASE_URL = "https://hustle-7c68d043.mileswebhosting.com/";
    private static final String BASE_URL = "https://spaceceindiafoundation.infinityfreeapp.com/";

    private static Retrofit retrofit = null;

    public static Retrofit getClient() {

        if (retrofit == null) {

            OkHttpClient client = new OkHttpClient.Builder()
                    .addInterceptor(chain -> {

                        Request original = chain.request();

                        Request request = original.newBuilder()
                                .addHeader("Accept", "application/json")
                                .addHeader("X-Requested-With", "XMLHttpRequest")
                                .addHeader("User-Agent", "Mozilla/5.0")
                                .build();

                        return chain.proceed(request);

                    })
                    .build();

            retrofit = new Retrofit.Builder()
                    .baseUrl(BASE_URL)
                    .client(client)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }

        return retrofit;
    }
}