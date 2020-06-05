package com.va181.danuartha.services;

import com.va181.danuartha.model.ResponseData;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiContact {

    @FormUrlEncoded
    @POST("insert.php")
    Call<ResponseData> addData(
            @Field("first_name") String firstName,
            @Field("last_name") String lastName,
            @Field("negara") String Negara,
            @Field("email") String email,
            @Field("photo") String photo,
            @Field("gender") String gender
    );

    @FormUrlEncoded
    @POST("update.php")
    Call<ResponseData> editData(
            @Field("id") String id,
            @Field("first_name") String firstName,
            @Field("last_name") String lastName,
            @Field("negara") String negara,
            @Field("email") String email,
            @Field("photo") String photo,
            @Field("gender") String gender
    );

    @FormUrlEncoded
    @POST("delete.php")
    Call<ResponseData> deleteData(
            @Field("id") String id
    );

    @FormUrlEncoded
    @POST("search.php")
    Call<ResponseData> searchData(
            @Field("search") String keyword
    );

    @GET("getdata.php")
    Call<ResponseData> getData();
}