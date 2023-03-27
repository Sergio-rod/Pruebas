import React from 'react';
import { View } from 'react-native';
import { Text } from 'native-base';
import { Center, Avatar } from "native-base";

const AnimalListItem = ({ animal }) => {
    return (
        <View>
            <Center>
                <Avatar size="48px" source={{
                    uri: animal.avatarUrl
                }} />
                <Text _dark={{
                    color: "warmGray.50"
                }} color="coolGray.800" bold>
                    {animal.fullName}
                </Text>
                <Text color="coolGray.600" _dark={{
                    color: "warmGray.200"
                }}>
                    {animal.recentText}
                </Text>
            </Center>

        </View>
    )
}

export default AnimalListItem;