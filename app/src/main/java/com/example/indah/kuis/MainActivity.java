package com.example.indah.kuis;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import java.util.HashMap;

public class MainActivity extends AppCompatActivity implements View.OnClickListener{
    private EditText editTextKode;
    private EditText editTextNama;
    private EditText editTextJenis;
    private Button buttonSimpan;
    private Button buttonTampil;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        editTextKode = (EditText)findViewById(R.id.etKode);
        editTextNama = (EditText)findViewById(R.id.etNama);
        editTextJenis = (EditText)findViewById(R.id.etJenis);

        buttonSimpan = (Button)findViewById(R.id.btnSimpan);
        buttonTampil = (Button)findViewById(R.id.btnTampil);

        buttonSimpan.setOnClickListener(this);
        buttonTampil.setOnClickListener(this);
    }

    private void addSayur(){
        final String kode = editTextKode.getText().toString().trim();
        final String nama = editTextNama.getText().toString().trim();
        final String jenis = editTextJenis.getText().toString().trim();

        class AddSayur extends AsyncTask<Void, Void, String> {

            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(MainActivity.this, "Menambahkan...", "Tunggu...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(MainActivity.this, s, Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... voids) {
                HashMap<String, String> params = new HashMap<>();
                params.put(Konfigurasi.KEY_SYR_KODE, kode);
                params.put(Konfigurasi.KEY_SYR_NAMA, nama);
                params.put(Konfigurasi.KEY_SYR_JENIS, jenis);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostRequest(Konfigurasi.URL_ADD, params);
                return res;
            }
        }
        AddSayur as = new AddSayur();
        as.execute();
    }

    @Override
    public void onClick(View view) {
        if (view == buttonSimpan){
            addSayur();

        }
        if (view == buttonTampil){
            Intent a = new Intent(MainActivity.this, Tampil.class);
            startActivity(a);
        }
    }
}
