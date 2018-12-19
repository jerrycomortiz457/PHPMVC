<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Leads ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Registered Datetime</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <?php 
            foreach($query->result() as $row){
                echo "<tr>
                        <th scope='row'>{$row->leads_id}</th>
                        <td>{$row->first_name}</td>
                        <td>{$row->last_name}</td>
                        <td>{$row->registered_datetime}</td>
                        <td>{$row->email}</td>                       
                    </tr>";
            }
        ?>
        <tbody>
           
        </tbody>
        </table>