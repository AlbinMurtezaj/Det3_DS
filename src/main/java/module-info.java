module com.example.det3_ds {
    requires javafx.controls;
    requires javafx.fxml;


    opens com.example.det3_ds to javafx.fxml;
    exports com.example.det3_ds;
}