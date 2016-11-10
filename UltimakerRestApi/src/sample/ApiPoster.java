package sample;

import okhttp3.*;
import org.jetbrains.annotations.Nullable;

import javax.xml.bind.DatatypeConverter;
import java.io.File;
import java.io.IOException;
import java.nio.file.Files;

/**
 * Created by bram on 11/10/16.
 */
public class ApiPoster
{
    private String username, password;

    public ApiPoster(String username, String password)
    {
        this.username = username;
        this.password = password;
    }

    public boolean post(File file){
        OkHttpClient client = new OkHttpClient();

        RequestBody formBody = new FormBody.Builder()
                .add("id", DatatypeConverter.printBase64Binary(getFileContents(file)))
                .build();

        Request request = new Request.Builder()
                .url("http://127.0.0.1:5000/printer")
                .post(formBody)
                .build();

        request = addBasicAuthHeaders(request);

        try{
            Response response = client.newCall(request).execute();
            System.out.println(response);
            return true;
        } catch (IOException ex){
            ex.printStackTrace();
            return false;
        }
    }

    private Request addBasicAuthHeaders(Request request) {
        final String login = "admin";
        final String password = "secret";
        String credential = Credentials.basic(login, password);
        return request.newBuilder().header("Authorization", credential).build();
    }

    @Nullable
    private byte[] getFileContents(File file){
        try
        {
            byte[] bytes = Files.readAllBytes(file.toPath());
            return bytes;

        } catch (IOException e)
        {
            e.printStackTrace();
            return null;
        }
    }


//    try
//    {
//        BufferedReader rd = new BufferedReader(new FileReader(path));
//        StringBuilder sb = new StringBuilder();
//        String line = rd.readLine();
//
//        while (line != null){
//            sb.append(line);
//            sb.append(System.lineSeparator());
//            line = rd.readLine();
//        }
//        System.out.println(sb.toString());
//        return sb.toString();
//    } catch (FileNotFoundException e)
//    {
//        e.printStackTrace();
//        return "";
//    } catch (IOException e)
//    {
//        e.printStackTrace();
//        return "";
//    }
}
