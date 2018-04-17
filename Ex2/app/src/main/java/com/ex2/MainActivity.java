package com.ex2;

import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import java.util.ArrayList;

import android.content.Context;
import android.content.res.Resources;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Spinner;

class ChangeCurrency{
    private String nameCurrency;
    private double price;
    public ChangeCurrency(String name, double price){
        this.nameCurrency =name;
        this.price = price;
    }
    public String getName(){
        return this.nameCurrency;
    }
    public double getPrice(){
        return this.price;
    }
}
public class MainActivity extends AppCompatActivity {
    private Spinner spinner;
    ChangeCurrency cur1 = new ChangeCurrency("USD-VND",22778.60);
    ChangeCurrency cur2 = new ChangeCurrency("VND-USD",0.0000439008);
    ChangeCurrency cur3 = new ChangeCurrency("EUR-VND",28183.74);
    ChangeCurrency cur4 = new ChangeCurrency("VND-EUR",0.0000354815);
    ChangeCurrency cur5 = new ChangeCurrency("USD-EUR",0.80826);
    ChangeCurrency cur6 = new ChangeCurrency("EUR-USD",1.2372);
    public String[] cur;

    {
        cur = new String[]{"USD-VND","VND-USD","EUR-VND","VND-EUR","USD-EUR","EUR-USD"};
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        spinner=(Spinner)findViewById(R.id.spinnerCurency);
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this,
                android.R.layout.simple_spinner_item, cur);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(dataAdapter);

        final EditText et=(EditText)findViewById(R.id.currency1);
        final TextView tv=(TextView)findViewById(R.id.currency2);
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                tv.setText("");
                et.setText("");
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
        et.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                if(s.length()!=0){
                    String curc = (String)spinner.getSelectedItem();
                    double curchange;
                    switch (curc){
                        case "USD-VND":curchange = Double.parseDouble(s.toString()) *(cur1.getPrice());
                            tv.setText(String.valueOf(curchange)); break;
                        case  "VND-USD":curchange = Double.parseDouble(s.toString()) *(cur2.getPrice());
                            tv.setText(String.valueOf(curchange)); break;
                        case "EUR-VND":curchange = Double.parseDouble(s.toString()) *(cur3.getPrice());
                            tv.setText(String.valueOf(curchange)); break;

                        case "VND-EUR":curchange = Double.parseDouble(s.toString()) *(cur4.getPrice());
                            tv.setText(String.valueOf(curchange)); break;
                        case "USD-EUR":curchange = Double.parseDouble(s.toString()) *(cur5.getPrice());
                            tv.setText(String.valueOf(curchange)); break;
                        case "EUR-USD": curchange = Double.parseDouble(s.toString()) *(cur6.getPrice());
                            tv.setText(String.valueOf(curchange)); break;
                        default: break;
                    }

                }
            }

            @Override
            public void afterTextChanged(Editable s) {

            }
        });

    }


}
