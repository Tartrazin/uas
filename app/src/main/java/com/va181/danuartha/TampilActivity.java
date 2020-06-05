package com.va181.danuartha;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

import com.jakewharton.picasso.OkHttp3Downloader;
import com.squareup.picasso.Picasso;

import de.hdodenhof.circleimageview.CircleImageView;

public class TampilActivity extends AppCompatActivity {

    private TextView tvName, tvnegara, tvEmail, tvGender;
    private CircleImageView imgProfilePicture;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tampil);

        tvName = findViewById(R.id.tv_full_name);
        tvnegara = findViewById(R.id.tv_negara);
        tvEmail = findViewById(R.id.tv_email_address);
        tvGender = findViewById(R.id.tv_gender);
        imgProfilePicture = findViewById(R.id.profile_image_display);

        Intent receivedData = getIntent();
        Bundle data = receivedData.getExtras();
        tvName.setText(data.getString("FULL_NAME"));
        tvnegara.setText(data.getString("NEGARA"));
        tvEmail.setText(data.getString("EMAIL"));
        tvGender.setText(data.getString("GENDER"));
        String imgLocation = data.getString("IMAGE");
        if (!imgLocation.equals(null)) {
            Picasso.Builder builder = new Picasso.Builder(getApplicationContext());
            builder.downloader(new OkHttp3Downloader(getApplicationContext()));
            builder.build().load(imgLocation)
                    .placeholder((R.drawable.ic_launcher_background))
                    .error(R.drawable.ic_launcher_background)
                    .into(imgProfilePicture);
        }
        imgProfilePicture.setContentDescription(imgLocation);
    }
}
